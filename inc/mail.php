<?php 
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
             
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$html = '<h2>Xin chào '.$username.' !!!</h2>
      <p>Cảm ơn bạn đã dịch vụ của chúng tôi. Hi vọng bạn sẽ có những trải nghiệm tuyệt vời !</p>
      <p>Dưới đây là mã số gồm 6 chữ số để kích hoạt tài khoản của bạn copy nó và dán vào phần xác minh để sử dụng tài khoản của bạn.</p>
      <p>Ngoài ra dưới đây là tài khoản và mật khẩu của bạn để ghi nhớ cho những lần đăng nhập sau.</p>
      <table style="width:100%;border: 1px solid black;border-collapse: collapse;">
      <tr>
      <td style="border: 1px solid black; text-align:center;" colspan="2"><h2>'.$number.'</h2></td>
      </tr>
      <tr>
      <th style="border: 1px solid black;padding: 5px">Username</th>
      <th style="border: 1px solid black;padding: 5px">Password</th>
      </tr>
      <tr>
      <td style="border: 1px solid black;padding: 5px">'.$username.'</td>
      <td style="border: 1px solid black;padding: 5px">'.$password.'</td>
      </tr>
      </table><br/>';


echo '<div class="place-overlay">';
            $mail = new PHPMailer(true);                              
               try {
                  //Server settings
                  $mail->SMTPDebug = 2;
                  $mail->isSMTP();                                    
                  $mail->Host = 'smtp.gmail.com';  
                  $mail->SMTPAuth = true;                             
                  $mail->Username = 'thangdotpro@gmail.com';
                  $mail->Password = 'chelsea1st';                           
                  $mail->SMTPSecure = 'tls';                            
                  $mail->Port = 587;


                  //Recipients
                  $mail->CharSet = 'UTF-8';
                  $mail->setFrom('thangdotpro@gmail.com', 'Desod-VN');
                  $mail->addAddress($email);  

                  $mail->isHTML(true);    
                  $mail->Subject = 'Xác minh tài khoản '.$username;
                  $mail->Body    = $html;
                   

                  $mail->send();
                  echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
echo '</div>';
?>