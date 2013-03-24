<?php

require("class.phpmailer.php");

class Mail{
    public static function send($html="",$title="",$from_name="",$from="",$password="",$to="",$addto="",$pic_list=""){
        try{
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = "smtp.163.com";
//            $mail->Host = "email.baidu.com"; // 您的企业邮局域名
            $mail->SMTPAuth = true;       // 启用SMTP验证功能
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port=25;
            $mail->From = $from;
            $mail->FromName = $from_name;

            if(is_array($to)){
                foreach($to as $person){
                    $mail->AddAddress($person, "$person");
                }
            }else if(is_string($to)){
                $mail->AddAddress($to, "$to");
            }
//            $mail->AddReplyTo("532205473@qq.com", "a");
            //$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
            $mail->IsHTML(true);          // set email format to HTML //是否使用HTML格式
            $mail->Subject = $title;      //邮件标题
//            $mail->addembeddedimage('./bb.jpg', 'reportimg','./bb.jpg');
//            $mail->Body = '<img src="cid:reportimg"/>'; //邮件内容
            $mail->Body = $html;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

            $mail->Send();
            return true;

        }catch (phpmailerException $e){
            return false;
        }
    }

    /*
     * 测试接口
     * */
    public static function template_send($html=""){
        $title = "fis测试";
        $from_name = "姜曙光";
        $from="jiangshuguangzz@163.com";
//        $from="jiangshuguang@baidu.com";
        $password="226406328js";
//        $to=array(
//               "ge-qa@baidu.com",
//               "shenlixia01@baidu.com",
//               "jiangshuguang@baidu.com",
//               "tianlili@baidu.com"
//        );
        $to=array(
            "532205473@qq.com"
        );
        $addto="";
        $pic_list="";
        $htmlContent = file_get_contents($html);
        return self::send($htmlContent,$title,$from_name,$from,$password,$to);
    }

    /*
     * 部分参数固定
     * */
    public static function set_send($mailTo,$html,$title){
        $from_name = "ge测试";
        $from="jiangshuguangzz@163.com";
        $password="226406328js";
        $htmlContent = file_get_contents($html);
        return self::send($htmlContent,$title,$from_name,$from,$password,$mailTo);
    }

}

//$htmlFile = "E:/test_dir/fis_report/psge/report_full_result/fis_pc_1.3.4_report.html";
//var_dump(file_get_contents($htmlFile));
//Mail::template_send($htmlFile);



