<?php
//        try{
//            $mail = new PHPMailer(); //建立邮件发送类
//            $address ="jiangshuguang@baidu.com";
//            $mail->IsSMTP(); // 使用SMTP方式发送
//            $mail->CharSet = "utf-8";
//            $mail->Host = "smtp.163.com"; // 您的企业邮局域名
//            $mail->SMTPAuth = true; // 启用SMTP验证功能
//            $mail->Username = "jiangshuguangzz@163.com"; // 邮局用户名(请填写完整的email地址)
//            $mail->Password = "226406328js"; // 邮局密码
//            $mail->Port=25;
//            $mail->From = "jiangshuguangzz@163.com"; //邮件发送者email地址
//            $mail->FromName = "jiangshuguang";
//            $mail->AddAddress("$address", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//
//            //$mail->AddReplyTo("", "");
//            //$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//            $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
//            $mail->Subject = "fis-pc"; //邮件标题
////            $mail->addembeddedimage('./bb.jpg', 'reportimg','./bb.jpg');
////            $mail->Body = '<img src="cid:reportimg"/>'; //邮件内容
//            $mail->Body = $html;
//            $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
//
//            $mail->Send();
//            echo "邮件发送成功";
//
//        }catch (phpmailerException $e){
//            echo $e;
//        }