<?php
// [file name]: Profile.php (Customer Controller)
namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));
        
        $data = [
            'user' => $user,
            'validation' => \Config\Services::validation()
        ];
        
        return view('profile', $data);
    }
    
    public function update()
    {
        // Check if user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/auth/login');
        }
        
        $userModel = new UserModel();
        $userId = session()->get('id');
        
        // Validation rules
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $userId . ']'
        ];
        
        // Check if password is being changed
        if ($this->request->getPost('current_password') || $this->request->getPost('new_password')) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min_length[8]';
            $rules['confirm_password'] = 'required|matches[new_password]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Verify current password if changing password
        if ($this->request->getPost('current_password')) {
            $user = $userModel->find($userId);
            
            if (!password_verify($this->request->getPost('current_password'), $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Current password is incorrect');
            }
            
            // Update with new password
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
            ];
        } else {
            // Update without changing password
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email')
            ];
        }
        
        if ($userModel->update($userId, $data)) {
            // Update session data
            session()->set('name', $data['name']);
            session()->set('email', $data['email']);
            
            return redirect()->to('/profile')->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update profile');
        }
    }
}