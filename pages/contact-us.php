<?php
/**
 * AYACHI Casino - Contact Us Page
 * HTML, CSS, PHP
 */

// Handle form submission
$form_submitted = false;
$form_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Basic validation
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // In a real application, you would send an email here
        // For now, we'll just show a success message
        $form_submitted = true;
        $form_message = "Thank you for your message! We'll get back to you soon.";
    } else {
        $form_message = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AYACHI Casino</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/pages.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Montserrat:wght@400;500;600;700&family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <div class="logo-icon">AY</div>
                <span class="logo-text">AYACHI</span>
            </div>
            <nav class="nav">
                <a href="../index.php" class="nav-link">HOME</a>
                <a href="../index.php#games" class="nav-link">GAMES</a>
                <a href="../index.php#features" class="nav-link">FEATURES</a>
                <a href="contact-us.php" class="nav-link">CONTACT</a>
            </nav>
            <button class="btn btn-primary">PLAY NOW</button>
        </div>
    </header>

    <!-- PAGE CONTENT -->
    <div class="page-container">
        <div class="container">
            <div class="page-header">
                <h1>Contact Us</h1>
                <p class="last-updated">We'd love to hear from you!</p>
            </div>

            <div class="page-content">
                <section class="policy-section">
                    <h2>Get in Touch</h2>
                    <p>
                        Have questions, feedback, or need support? We're here to help. Contact us using any of the methods below.
                    </p>
                </section>

                <section class="contact-section">
                    <div class="contact-form-container">
                        <h2>Send us a Message</h2>
                        <?php if ($form_submitted): ?>
                            <div class="success-message">
                                <p><?php echo $form_message; ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" class="contact-form">
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" id="name" name="name" required placeholder="Enter your full name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required placeholder="Enter your email">
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <input type="text" id="subject" name="subject" required placeholder="What is this about?">
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="6" required placeholder="Tell us more..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>

                    <div class="contact-info-container">
                        <h2>Contact Information</h2>
                        
                        <div class="contact-info-box">
                            <h3>Office Address</h3>
                            <p>
                                AYACHI Healthcare Pvt. Ltd.<br>
                                H. NO. 1/104, NEW JIA MAU<br>
                                NEAR PARAG, ATM<br>
                                LUCKNOW, Uttar Pradesh, 226001<br>
                                India
                            </p>
                        </div>

                        <div class="contact-info-box">
                            <h3>Email</h3>
                            <p>
                                <strong>General Inquiries:</strong><br>
                                <a href="mailto:info@ayachi.com">info@ayachi.com</a>
                            </p>
                            <p>
                                <strong>Support:</strong><br>
                                <a href="mailto:support@ayachi.com">support@ayachi.com</a>
                            </p>
                            <p>
                                <strong>Technical Issues:</strong><br>
                                <a href="mailto:tech@ayachi.com">tech@ayachi.com</a>
                            </p>
                        </div>

                        <div class="contact-info-box">
                            <h3>Phone</h3>
                            <p>
                                <strong>24/7 Support:</strong><br>
                                <a href="tel:+919999999999">+91-9999-999-999</a>
                            </p>
                        </div>

                        <div class="contact-info-box">
                            <h3>Business Hours</h3>
                            <p>
                                Monday - Friday: 9:00 AM - 6:00 PM IST<br>
                                Saturday: 10:00 AM - 4:00 PM IST<br>
                                Sunday: Closed<br>
                                <strong>24/7 Support Available</strong>
                            </p>
                        </div>

                        <div class="contact-info-box">
                            <h3>Company Details</h3>
                            <p>
                                <strong>CIN:</strong> U24110UP2020PTC135826<br>
                                <strong>GST No:</strong> 09AAUCA1674K1Z1<br>
                                <strong>PAN No:</strong> AAUCA1674K
                            </p>
                        </div>
                    </div>
                </section>

                <section class="policy-section">
                    <h2>Frequently Asked Questions</h2>
                    <div class="faq-item">
                        <h3>How do I start playing?</h3>
                        <p>
                            Simply click "PLAY NOW" on any page. No registration or login required. You'll start with 1000 
                            free credits and can begin playing immediately.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>Is AYACHI Casino free to play?</h3>
                        <p>
                            Yes! AYACHI Casino is completely free. No real money is involved. You play with virtual credits 
                            for entertainment only.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>Can I win real money?</h3>
                        <p>
                            No. This is a free-to-play entertainment platform. No prizes or real winnings are given. All 
                            credits are virtual and have no monetary value.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>What games are available?</h3>
                        <p>
                            We offer four premium games: Slots, Roulette, Blackjack, and Poker. Each game features realistic 
                            casino mechanics and fair gameplay.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>How do I reset my credits?</h3>
                        <p>
                            You can reset your credits anytime by clicking the "RESET" button in any game. You'll receive 
                            1000 fresh credits to continue playing.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>Is my information secure?</h3>
                        <p>
                            Yes. We use industry-standard security measures to protect your information. We do not collect 
                            personal information unless you voluntarily provide it through contact forms.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>Can I play on mobile?</h3>
                        <p>
                            Yes! AYACHI Casino is fully responsive and works on all devices - desktop, tablet, and mobile. 
                            Enjoy the same great experience on any device.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h3>What is the minimum age requirement?</h3>
                        <p>
                            You must be 18 years or older to use AYACHI Casino. By using our platform, you confirm that you 
                            meet this age requirement.
                        </p>
                    </div>
                </section>

                <section class="policy-section disclaimer-box">
                    <p>
                        <strong>⚠ Contact Notice:</strong> We appreciate your interest in AYACHI Casino. 
                        We aim to respond to all inquiries within 24 hours. For urgent matters, please call our 24/7 support line.
                    </p>
                </section>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>AYACHI Casino</h4>
                    <p>Premium free-to-play casino games for entertainment only.</p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="contact-us.php">Contact</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="terms-conditions.php">Terms & Conditions</a></li>
                        <li><a href="fair-policy.php">Fair Policy</a></li>
                        <li><a href="disclaimer.php">Disclaimer</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Responsible Gaming</h4>
                    <ul>
                        <li><a href="responsible-gaming.php">Responsible Gaming</a></li>
                        <li><a href="community-rules.php">Community Rules</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 AYACHI Healthcare Pvt. Ltd. All rights reserved.</p>
                <p><strong>FREE TO PLAY</strong> • No Real Money • No Prizes • Entertainment Only</p>
            </div>
        </div>
    </footer>

    <style>
        .contact-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin: 3rem 0;
        }

        .contact-form-container, .contact-info-container {
            background: rgba(212, 175, 55, 0.05);
            padding: 2rem;
            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .contact-form-container h2, .contact-info-container h2 {
            color: #d4af37;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #d4af37;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 4px;
            color: #fff;
            font-family: inherit;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #d4af37;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.2);
        }

        .contact-info-box {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .contact-info-box:last-child {
            border-bottom: none;
        }

        .contact-info-box h3 {
            color: #d4af37;
            margin-bottom: 0.75rem;
        }

        .contact-info-box a {
            color: #00d4ff;
            text-decoration: none;
        }

        .contact-info-box a:hover {
            text-decoration: underline;
        }

        .success-message {
            background: rgba(76, 175, 80, 0.1);
            border: 1px solid #4caf50;
            border-radius: 4px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #4caf50;
        }

        .faq-item {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-item h3 {
            color: #d4af37;
            margin-bottom: 0.75rem;
        }

        @media (max-width: 768px) {
            .contact-section {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</body>
</html>
