<?php

require("class.phpmailer.php");

class Mail{
    public static function send($mailTo,$mailCC,$content,$title){
        try{
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = "mail1-in.baidu.com";
            $mail->Port=25;
            $mail->From = "gebugreport@baidu.com";
            $mail->FromName = "ge测试报告";

            if(is_array($mailTo) && count($mailTo)>0){
                foreach($mailTo as $person){
                    $mail->AddAddress($person, "$person");
                }
            }else if(is_string($mailTo) && $mailTo!=""){
                $mail->AddAddress($mailTo, "$mailTo");
            }

            if(is_array($mailCC) && count($mailCC)>0){
                foreach($mailCC as $person){
                    $mail->AddCC($person,"$person");
                }
            }else if(is_string($mailCC && $mailCC!="")){
                $mail->AddCC($mailCC,"$mailCC");
            }

//          $mail->AddReplyTo("532205473@qq.com", "a");
//          $mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
            $mail->IsHTML(true);          // set email format to HTML //是否使用HTML格式
            $mail->Subject = $title;      //邮件标题
//          $mail->addembeddedimage('./bb.jpg', 'reportimg','./bb.jpg');
//          $mail->Body = '<img src="cid:reportimg"/>'; //邮件内容
            $mail->Body = $content;
//            $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

            $mail->Send();
            return true;

        }catch (phpmailerException $e){
            return false;
        }
    }



    public static function doSend($mailTo,$mailCC,$content,$title){
        $content = file_get_contents($content);
        return self::send($mailTo,$mailCC,$content,$title);
    }

    public static function doTemplateSend($content){
        $mailTo = array(
            "jiangshuguang@baidu.com"
        );
        $mailCC = array(
            "ge-qa@baidu.com"
        );
        $title = "测试报告";
        $content = file_get_contents($content);
        return self::send($mailTo,$mailCC,$content,$title);
    }
}

//$htmlFile = "E:/test_dir/ge/psge/report_simple_result/fis_pc_1.3.8_report.html";
//var_dump(file_get_contents($htmlFile));
//Mail::doTemplateSend($htmlFile);



