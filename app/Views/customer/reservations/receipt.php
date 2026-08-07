<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt #<?= str_pad($reservation['id'], 5, '0', STR_PAD_LEFT) ?></title>
    
    <style>
        /* PRINT STYLES - Guaranteed to work */
        @media print {
            @page {
                size: A4;
                margin: 15mm;
            }
            
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                font-size: 11pt;
                line-height: 1.3;
                background: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            
            .no-print {
                display: none !important;
            }
            
            .receipt-container {
                width: 100%;
                max-width: 100%;
                margin: 0;
                padding: 0;
                border: 1px solid #000;
            }
            
            /* Force dark header */
            .header {
                background: #0f2823 !important;
                color: white !important;
                -webkit-print-color-adjust: exact !important;
            }
            
            /* Force success badge */
            .status-badge {
                background: #198754 !important;
                color: white !important;
                border: 1px solid #000 !important;
            }
            
            .total-box {
                border: 2px solid #000 !important;
                background: #f8f9fa !important;
            }
        }
        
        /* SCREEN STYLES */
        @media screen {
            body {
                background: #f5f5f5;
                padding: 20px;
                font-family: Arial, sans-serif;
            }
            
            .receipt-container {
                max-width: 800px;
                margin: 0 auto;
                background: white;
                box-shadow: 0 0 20px rgba(0,0,0,0.1);
                border: 1px solid #ddd;
            }
        }
        
        /* UNIVERSAL STYLES */
        .receipt-container {
            width: 100%;
            box-sizing: border-box;
        }
        
        .header {
            background: #0f2823;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #000;
        }
        
        .store-name {
            font-size: 24px;
            font-weight: bold;
            margin: 0 0 5px 0;
            font-family: Georgia, serif;
        }
        
        .store-tagline {
            font-size: 12px;
            opacity: 0.9;
            margin: 0 0 15px 0;
        }
        
        .receipt-title {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0 5px 0;
        }
        
        .receipt-number {
            font-size: 14px;
            margin: 0;
        }
        
        .content {
            padding: 20px;
        }
        
        /* COMPACT TWO-COLUMN LAYOUT */
        .info-row {
            display: flex;
            margin-bottom: 15px;
            gap: 20px;
        }
        
        .info-col {
            flex: 1;
            min-width: 0;
        }
        
        .info-label {
            font-size: 10px;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .info-value {
            font-size: 13px;
            margin: 0;
        }
        
        /* ITEM SECTION */
        .item-section {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 15px 0;
            margin: 15px 0;
        }
        
        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        
        .item-name {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
            font-family: Georgia, serif;
        }
        
        .item-price {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }
        
        .item-desc {
            font-size: 12px;
            color: #666;
            margin: 5px 0 10px 0;
        }
        
        .item-details {
            display: flex;
            gap: 20px;
            font-size: 12px;
        }
        
        .detail-label {
            color: #666;
        }
        
        /* STATUS BADGE */
        .status-badge {
            background: #198754;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        /* PAYMENT SUMMARY - ULTRA COMPACT */
        .payment-summary {
            margin: 20px 0;
        }
        
        .summary-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .summary-table td {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }
        
        .summary-table tr:last-child td {
            border-bottom: none;
            font-weight: bold;
            font-size: 14px;
        }
        
        .summary-table .total-row td {
            padding-top: 15px;
        }
        
        .text-right {
            text-align: right;
        }
        
        /* FOOTER */
        .footer {
            border-top: 1px solid #000;
            padding-top: 15px;
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        
        .footer p {
            margin: 3px 0;
        }
        
        /* BUTTONS (SCREEN ONLY) */
        .print-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px 20px;
            background: #0f2823;
            color: white;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        
        .print-btn:hover {
            background: #0b1f1a;
        }
    </style>
</head>
<body>
    <!-- RECEIPT CONTAINER - 1 PAGE ONLY -->
    <div class="receipt-container">
        <!-- HEADER -->
        <div class="header">
            <div class="store-name">Jewelry Store</div>
            <div class="store-tagline">Luxury Rings & Custom Jewelry</div>
            <div class="receipt-title">PAYMENT RECEIPT</div>
            <div class="receipt-number">#<?= str_pad($reservation['id'], 5, '0', STR_PAD_LEFT) ?></div>
        </div>
        
        <!-- CONTENT -->
        <div class="content">
            <!-- Status -->
            <div class="status-badge">
                ✓ PAID - <?= date('M d, Y', strtotime($reservation['payment_date'])) ?>
            </div>
            
            <!-- Compact Info Row -->
            <div class="info-row">
                <div class="info-col">
                    <div class="info-label">Customer</div>
                    <div class="info-value"><?= esc($reservation['customer_name']) ?></div>
                    <div class="info-value" style="font-size: 11px; color: #666;"><?= esc($reservation['email']) ?></div>
                </div>
                
                <div class="info-col">
                    <div class="info-label">Order & Payment</div>
                    <div class="info-value">Order: <?= date('M d, Y', strtotime($reservation['created_at'])) ?></div>
                    <div class="info-value">Method: <?= ucfirst($reservation['payment_method']) ?></div>
                    <div class="info-value" style="font-size: 10px;">ID: JS-<?= str_pad($reservation['id'], 6, '0', STR_PAD_LEFT) ?></div>
                </div>
            </div>
            
            <!-- Item Section -->
            <div class="item-section">
                <div class="item-header">
                    <div class="item-name"><?= esc($reservation['ring_name']) ?></div>
                    <div class="item-price">$<?= number_format($reservation['ring_price'], 2) ?></div>
                </div>
                
                <div class="item-desc"><?= esc($reservation['description']) ?></div>
                
                <div class="item-details">
                    <div><span class="detail-label">Size:</span> <?= esc($reservation['custom_size']) ?></div>
                    <div><span class="detail-label">Material:</span> <?= esc($reservation['material']) ?></div>
                </div>
                
                <?php if(!empty($reservation['custom_notes'])): ?>
                <div style="margin-top: 10px; font-size: 11px; color: #666;">
                    <strong>Notes:</strong> <?= esc($reservation['custom_notes']) ?>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Payment Summary -->
            <div class="payment-summary">
                <table class="summary-table">
                    <tr>
                        <td>Item Price</td>
                        <td class="text-right">$<?= number_format($reservation['ring_price'], 2) ?></td>
                    </tr>
                    <tr>
                        <td>Customization</td>
                        <td class="text-right">$<?= number_format($reservation['total_amount'] - $reservation['ring_price'], 2) ?></td>
                    </tr>
                    <tr class="total-row">
                        <td>TOTAL PAID</td>
                        <td class="text-right" style="font-size: 16px; color: #0f2823;">
                            $<?= number_format($reservation['total_amount'], 2) ?>
                        </td>
                    </tr>
                </table>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p>123 Jewelry Street, City, Country • (123) 456-7890 • info@jewelrystore.com</p>
                <p>Thank you for your purchase. This is your official receipt.</p>
                <p>Generated: <?= date('M d, Y g:i A') ?></p>
            </div>
        </div>
    </div>
    
    <!-- PRINT BUTTON (Screen only) -->
    <div class="no-print">
        <button onclick="window.print()" class="print-btn">🖨️ PRINT RECEIPT</button>
        <a href="/reservations/history" style="display: block; text-align: center; margin: 10px auto; color: #0f2823; text-decoration: none;">← Back to Orders</a>
    </div>

    <?php if(isset($autoPrint) && $autoPrint): ?>
    <script>
    // Auto print with delay
    setTimeout(function() {
        window.print();
    }, 500);
    </script>
    <?php endif; ?>
</body>
</html>