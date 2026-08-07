<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report - Print</title>
    <style>
        @media print {
            @page {
                size: A4;
                margin: 1cm;
            }
            
            body {
                font-family: 'Arial', sans-serif;
                line-height: 1.6;
                color: #000;
            }
            
            .no-print {
                display: none !important;
            }
            
            .print-only {
                display: block !important;
            }
        }
        
        body {
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            color: #333;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .header .subtitle {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }
        
        .report-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            font-size: 12px;
        }
        
        .total-revenue {
            text-align: center;
            margin: 40px 0;
            padding: 20px;
            border: 2px solid #000;
        }
        
        .total-revenue h2 {
            margin: 0 0 10px 0;
            font-size: 16px;
            text-transform: uppercase;
        }
        
        .total-revenue .amount {
            font-size: 36px;
            font-weight: bold;
        }
        
        .metrics-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
        }
        
        .metrics-table th {
            background-color: #f5f5f5;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #000;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        
        .metrics-table td {
            padding: 15px 12px;
            border-bottom: 1px solid #ddd;
        }
        
        .metrics-table tr:last-child td {
            border-bottom: 2px solid #000;
        }
        
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        
        .metric-value {
            font-weight: bold;
            font-size: 18px;
        }
        
        .completed {
            color: #28a745;
        }
        
        .active {
            color: #ffc107;
        }
        
        .pending {
            color: #6c757d;
        }
        
        .print-actions {
            text-align: center;
            margin: 20px 0;
        }
        
        .print-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="print-actions no-print">
        <button onclick="window.print()" class="print-btn">Print Report</button>
        <button onclick="window.close()" class="print-btn" style="background: #6c757d; margin-left: 10px;">Close</button>
    </div>
    
    <div class="header">
        <h1>Sales & Inventory Report</h1>
        <div class="subtitle">JewelSys Management System</div>
    </div>
    
    <div class="report-info">
        <div>Report ID: JWS-<?= date('Ymd-His') ?></div>
        <div>Generated: <?= date('F d, Y • h:i A', strtotime($generated_at)) ?></div>
    </div>
    
    <div class="total-revenue">
        <h2>Total Verified Revenue</h2>
        <div class="amount">$<?= number_format($total_sales, 2) ?></div>
    </div>
    
    <table class="metrics-table">
        <thead>
            <tr>
                <th>Metric Category</th>
                <th>Description</th>
                <th>Volume</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Completed Orders</strong></td>
                <td>Successfully delivered and finalized</td>
                <td class="metric-value completed"><?= $completed_orders ?></td>
            </tr>
            <tr>
                <td><strong>Active (Paid) Orders</strong></td>
                <td>Payment received, processing in progress</td>
                <td class="metric-value active"><?= $active_orders ?></td>
            </tr>
            <tr>
                <td><strong>Pending Reservations</strong></td>
                <td>Awaiting payment or confirmation</td>
                <td class="metric-value pending"><?= $pending_orders ?></td>
            </tr>
        </tbody>
    </table>
    
    <div class="footer">
        <p>JewelSys Management System • Confidential Internal Report</p>
        <p>Page 1 of 1 • Printed on <?= date('Y-m-d H:i:s') ?></p>
    </div>
    
    <script>
        // Auto-print when page loads (optional)
        window.onload = function() {
            // Uncomment the line below if you want it to auto-print
            // window.print();
        };
    </script>
</body>
</html>