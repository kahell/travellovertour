<?php
Class Email_model extends CI_Model{

	function sendVerificatinEmail($emailPemesan, $namaPemesan,$total_harga,$calulate, $expiredDay, $caraBayar, $paketData){
	// load library email
        $this->load->library('PHPMailerAutoload');
        
        $mail = new PHPMailer();
        //$mail->SMTPDebug = 2;
        //$mail->Debugoutput = 'html';
        
        // set smtp
        $mail->isSMTP();
        $mail->Host = 'mail.suitdevelopers.com';//alana.rapidplex.com
        $mail->Port = '465';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = 'helfipangestu@suitdevelopers.com';
        $mail->Password = 'Helfi!2!2#';
        $mail->WordWrap = 50;  
        // set email content
        $mail->setFrom('helfipangestu@suitdevelopers.com', 'Suitdev Team');
        $mail->addAddress($emailPemesan);
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachment
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        //Konten
        $mail->Subject = 'Email Verification';
        $mail->Body = "<!DOCTYPE html>
        <html>
        <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Payment</title> 
        <style type= 'text/css'>
        /*Outlook.com / Hotmail*/
        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        /*Outlook 2007 / 2010 / 2013*/
  #outlook a {
        padding: 0;
    }

    /*Yahoo*/
    .yshortcuts { color: #434343 } /* Body text color */
    .yshortcuts a span { color: #0d7fcc } /* Link text color */
    </style> 
    </head>

    <body style='-ms-text-size-adjust: 100%; 
    -webkit-text-size-adjust: 100%;
    background-color: #E6EAED; 
    font-family: sans-serif; 
    height: 100% !important; 
    margin: 0; padding: 0; 
    width: 100% !important'>
    <!-- Table 1-->
    <table align= 'center' cellpadding= '0' cellspacing= '0' border= '0'
    style='-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; 
    border-collapse: collapse !important; mso-table-lspace: 0; mso-table-rspace: 0'>
    <tbody> 
    <tr> 
    <td style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <p style='-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #fff; font-size: 0px; font-weight: normal; line-height: 24px; margin: 0'>
    </p>
    </td> 
    </tr> 
    </tbody> 
    </table>
    <!-- End of Table 1-->
    <table border= '0' cellpadding= '0' cellspacing= '0' width= '100%' class= 'body-table' style='-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #E6EAED; border-collapse: collapse !important; height: 100% !important; margin: 0; mso-table-lspace: 0; mso-table-rspace: 0; padding: 0; width: 100% !important'> 
    <tbody> 
    <tr> 
    <td align= 'center' valign= 'top' class= 'body-cell' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; height: 100% !important; margin: 0; mso-table-lspace: 0; mso-table-rspace: 0; padding: 0; width: 100% !important'> 

    <div style= 'height: 24px; width: 100%'> 

    </div>

    <table border= '0' cellpadding= '0' cellspacing= '0' class= 'template-container' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; width: 100%; max-width: 600px; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <tbody>
    <tr> 
    <td align= 'center' valign= 'top' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <div style= 'border-bottom: 2px solid #dadada; border-radius: 4px; overflow: hidden;'> 
    <table border= '0' cellpadding= '0' cellspacing= '0' width='100%' class= 'template-body' style='-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #fff; border-collapse: collapse !important; mso-table-lspace: 0; mso-table-rspace: 0;'> 
    <tbody> 
    <tr> 
    <td valign= 'top' class= 'header-stripe' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #073E68; display: block; font-weight: normal; height: 3px; mso-table-lspace: 0; mso-table-rspace: 0; width: 100%'>&nbsp;
    </td> 
    </tr> 
    <tr> 
    <td valign= 'top' class= 'body-content p-b-0' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #434343; font-family: sans-serif; font-size: 14px; font-weight: normal; line-height: 150%; mso-table-lspace: 0; mso-table-rspace: 0; padding: 24px 16px; padding-bottom: 0 !important; text-align: left'> 
    <img src= 'https://mir-cdn.behance.net/v1/rendition/project_modules/disp/c2bb3753105913.59cbae39b79a8.png' alt= 'Travellover' width= '112' style='-ms-interpolation-mode: bicubic; border: 0; display: inline; height: auto; line-height: 100%; max-width: 560px; outline: none; text-decoration: none'>
    <div class= 'spacer-md' style= 'display: block; height: 32px; width: 100%'>
    &nbsp;
    </div> 
    <h1 style= 'color: inherit; display: block; font-family: sans-serif; font-size: 22px; font-style: normal; font-weight: normal;letter-spacing: normal; line-height: 26px; margin: 0; text-align: left'>Selesaikan pembayaran Anda sebelum Selasa, $expiredDay
    </h1> 
    <div class= 'spacer' style= 'display: block; height: 24px; width: 100%'>
    &nbsp;
    </div> 
    </td> 
    </tr> 
    <tr> 
    <td valign= 'top' class= 'body-content p-t-0 p-r-0 p-l-0 p-b-0' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #434343; font-family: sans-serif; font-size: 14px; font-weight: normal; line-height: 150%; mso-table-lspace: 0; mso-table-rspace: 0; padding: 24px 16px; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; padding-top: 0 !important; text-align: left'> 
    <table border= '0' cellpadding= '0' cellspacing= '0' width= '100%' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <tbody>

    <tr> 
    <td class= 'row-content bg-gray' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; padding: 16px'>
    <h3 class= 'text-normal' style= 'color: inherit; display: block; font-family: sans-serif; font-size: 16px; font-style: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; margin: 0; text-align: left'>$paketData[typeTrip_paket] trip&nbsp;</h3> 
    <p class= 'text-sm text-gray' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8f8f8f; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0'>$paketData[nama_paket] &nbsp; $paketData[lokasi_paket]<span></span>
    </p> 
    </td> 
    </tr> 

    <tr> 
    <td valign= 'top' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; height: 8px; line-height: 8px; mso-table-lspace: 0; mso-table-rspace: 0; width: 100%'>&nbsp;</td>
    </tr>

    <tr>
    <td class= 'row-content' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; padding: 16px; padding-top: 32px'> 
    <p class= 'm-b-sm text-gray' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8f8f8f; font-size: 16px; font-weight: normal; line-height: 24px; margin: 0; margin-bottom: 8px !important'>Yth. $namaPemesan,</p>
    <h2 class= 'text-normal' style= 'color: inherit; display: block; font-family: sans-serif; font-size: 18px; font-style: normal; font-weight: normal;letter-spacing: normal; line-height: 24px; margin: 0; text-align: left'>Mohon transfer ke
    </h2> 
    </td> 
    </tr>

    <tr>
    <td class= 'row-content b-t p-t-sm p-b-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-top: 1px solid #dadada; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; padding: 16px; padding-bottom: 8px !important; padding-top: 8px !important;'>
    <table width= '100%' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; mso-table-lspace: 0; mso-table-rspace: 0'>
    <tbody>
    <tr>
    <td class= 'p-r' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; padding-right: 16px !important; vertical-align: middle' width= '24'> 
    <img width= '24' src= 'https://s3-ap-southeast-1.amazonaws.com/travellovertour/imageResource/2017/05/28/1495965312675-279ec7685d40ef7db18f1b49838da7ce.png' style= '-ms-interpolation-mode: bicubic; border: 0; display: inline; height: auto; line-height: 100%; max-width: 560px; outline: none; text-decoration: none'> 
    </td>
    <td style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <p class= 'label' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8F8F8F; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0'>No. Rekening</p> 
    <p class= 'text-bold text-number' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 16px; font-weight: bold; letter-spacing: 1px; line-height: 24px; margin: 0'>084 999 1100</p> 
    </td> 
    </tr> 
    </tbody>
    </table> 
    </td>
    </tr>

    <tr>
    <td class= 'row-content bg-gray p-t-sm p-b-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0;padding: 16px; padding-bottom: 8px !important; padding-left: 56px; padding-top: 8px !important'>
    <table width= '100%' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <tbody>
    <tr> 
    <td style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0'>
    <p class= 'label' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8F8F8F; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0'>Nama Pemilik Rekening</p> 
    <p style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 16px; font-weight: normal; line-height: 24px; margin: 0'>Pasca</p> 
    </td> 
    <td style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; text-align: right; vertical-align: middle'>
    <img src= 'https://da8hvrloj7e7d.cloudfront.net/imageResource/2017/01/06/1483707671328-03b97002d826e482d58654eff5aee566.png' alt= 'bca' style= '-ms-interpolation-mode: bicubic; border: 0; display: inline; height: auto; line-height: 100%; max-height: 32px; max-width: 200px; outline: none; text-decoration: none; vertical-align: middle;'>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr> 

    <tr> 
    <td class= 'row-content p-t-sm p-b-0' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; padding: 16px; padding-bottom: 0 !important; padding-left: 56px; padding-top: 8px !important'> 
    <p class= 'label' style='-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8F8F8F; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0'>Jumlah Total</p> 
    <p class= 'transfer-amount text-number' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 16px;font-weight: bold; height: 32px; letter-spacing: 1px; line-height: 24px; margin: 0'>Rp $calulate <span style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 14px;font-weight: normal; height: 32px; letter-spacing: 1px; line-height: 24px; margin: 0'> - $caraBayar dari $total_harga
    </span></p> 
    </td> 
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </div> 
    <div class= 'spacer' style= 'display: block; height: 16px; width: 100%'>&nbsp;</div> 
    <div style= 'border-bottom: 2px solid #dadada; border-radius: 4px; overflow: hidden;'>
    <table border= '0' cellpadding= '0' cellspacing= '0' width='100%' class= 'template-body' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #fff; border-collapse: collapse!important; mso-table-lspace: 0; mso-table-rspace: 0;'> 
    <tbody>
    <tr> 
    <td valign= 'top' class= 'body-content p-b-0' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #434343; font-family: sans-serif; font-size: 14px; font-weight: normal; line-height: 150%; mso-table-lspace: 0; mso-table-rspace: 0; padding: 24px 16px; padding-bottom: 0 !important; text-align: left'> 
    <h3 class= 'text-normal m-t-0 m-b-sm' style= 'color: inherit; display: block; font-family: sans-serif; font-size: 16px; font-style: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; margin: 0; margin-bottom: 8px !important; margin-top:0 !important; text-align: left'>Anda sudah membayar?</h3> 
    <p class= 'fm-t-0 m-b-sm text-gray text-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8f8f8f; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0; margin-bottom: 8px !important'> Setelah pembayaran silahkan konfirmasi upload bukti pembayaran ke email travellover@gmail.com </p> 
    <div class= 'spacer-xs' style= 'display: block; height: 8px; width: 100%'>&nbsp;</div>
    </td>
    </tr>
    <tr> 
    <td valign= 'top' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; height: 24px; mso-table-lspace: 0; mso-table-rspace: 0; width: 100%'>&nbsp;
    </td>
    </tr>
    </tbody>
    </table>
    </div> 
    <div class= 'spacer' style= 'display: block; height: 16px; width: 100%'>&nbsp;</div> 
    <div style= 'background-color: #F4FBFE; border: 1px solid #1BA0E2; border-radius: 4px; overflow: hidden;'> 
    <table border= '0' cellpadding= '0' cellspacing= '0' width='100%' class= 'template-body bg-blue' style='-ms-text-size-adjust: 100%; -webkit-box-shadow: 0 1px 3px 0 rgba(27, 27, 27, 0.1); -webkit-text-size-adjust: 100%; border-collapse: collapse !important;  mso-table-lspace: 0; mso-table-rspace: 0;'> 
    <tbody> 
    <tr> 
    <td valign= 'top' class= 'body-content p-b-0 text-white' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #434343; font-family: sans-serif; font-size: 14px; font-weight: normal; line-height: 150%; mso-table-lspace: 0; mso-table-rspace: 0; padding: 24px 16px; padding-bottom: 0 !important; text-align: left'> 
    <h3 class= 'text-normal m-t-0 m-b-sm' style= 'color: inherit; display: block; font-family: sans-serif; font-size: 18px; font-style: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; margin: 0; margin-bottom: 8px !important; margin-top: 0 !important; text-align: left'>Perlu bantuan?</h3> 
    <p class= 'fm-t-0 m-b-sm text-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #434343; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0; margin-bottom: 8px !important'>Silahkan hubungi kami ke kontak berikut.</p> 
    </td>
    </tr>
    <tr> 
    <td valign= 'top' class= 'body-content p-b-0 text-white' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #fff; font-family: sans-serif; font-size: 14px; font-weight: normal; line-height: 150%; mso-table-lspace: 0; mso-table-rspace: 0; padding: 24px 16px; padding-bottom: 0 !important; text-align: left'>
    <table align= 'left' class= 'm-r m-b' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; margin-bottom: 16px !important; margin-right: 16px!important;mso-table-lspace: 0; mso-table-rspace: 0'>
    <tbody>
    <tr> 
    <td class= 'p-r' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; padding-right: 16px !important; vertical-align: top'> <p class= 'text-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8F8F8F; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0'>Email</p> <p class= 'text-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 14px; font-weight: bold; line-height: 22px; margin: 0'><a style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #0770cd' href= 'mailto:cs@travellovertour.com'>travellover@gmail.com</a> </p> </td> 
    </tr> 
    </tbody>
    </table> 
    <table align= 'left' class= 'm-b' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; margin-bottom: 16px !important; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <tbody>
    <tr> 
    <td style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0; text-align: left'> 
    <div style= 'display: inline-block; text-align: left'> 
    <p class= 'text-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #8F8F8F; font-size: 14px; font-weight: normal; line-height: 22px; margin: 0'>Telepon</p> 
    <p class= 'text-sm' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 14px; font-weight: bold; line-height: 22px; margin: 0'><a style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #0770cd' href= 'tel:+60 15 4840 9469'>0804-1500-308</a> </p>
    </div> </td> 
    </tr> 
    </tbody>
    </table> </td> 
    </tr> 
    <tr> 
    <td valign= 'top' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; height: 8px; line-height: 8px; mso-table-lspace: 0; mso-table-rspace: 0; width: 100%'>&nbsp;</td>
    </tr> 
    </tbody> 
    </table> 
    </div> 
    <div class= 'spacer-md' style= 'display: block; height: 24px; width: 100%'>
    &nbsp;
    </div> 
    <table border= '0' cellpadding= '0' cellspacing= '0' width= '100%' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse !important; mso-table-lspace: 0; mso-table-rspace: 0'> 
    <tbody>
    <tr> 
    <td valign= 'top' align= 'left' class= 'post-footer-content' style= '-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-weight: normal; mso-table-lspace: 0; mso-table-rspace: 0'><span class= 'post-footer-text' style= 'color: #727272; display: block; font-family: sans-serif; font-size: 13px; font-weight: normal; line-height: 18px; padding-left: 16px; padding-right: 16px'>Email ini ditujukan kepada $namaPemesan, karena Anda telah melakukan pemesanan di travellovertour.</span> 
    <div class= 'spacer-sm' style= 'display: block; height: 16px; width: 100%'>
    &nbsp;
    </div> 
    <div class= 'divider' style= 'border-bottom: 1px solid #dadada; display: block; height: 8px; margin-bottom: 8px; width: 100%'>
    &nbsp;
    </div> 
    <div class= 'spacer-sm' style= 'display: block; height: 16px; width: 100%'>
    &nbsp;
    </div><span class= 'post-footer-text' style= 'color: #727272; display: block; font-family: sans-serif; font-size: 13px; font-weight: normal; line-height: 18px; padding-left: 16px; padding-right: 16px'>Copyright Travellover. All Rights Reserved.</span> 
    <div class= 'spacer-sm' style= 'display: block; height: 16px; width: 100%'>
    &nbsp;
    </div>
    <div class= 'divider' style= 'border-bottom: 1px solid #dadada; display: block; height: 8px; margin-bottom: 8px; width: 100%'>
    &nbsp;
    </div> 
    <div class= 'spacer-sm' style= 'display: block; height: 16px; width: 100%'>
    &nbsp;
    </div>
    </td> 
    </tr> 
    </tbody>
    </table> 
    <div class= 'spacer-md' style= 'display: block; height: 32px; width: 100%'>
    &nbsp;
    </div> </td> 
    </tr> 
    </tbody> 
    </table> </td> 
    </tr> 
    </tbody> 
    </table>
    </body>
    </html>";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
}

function verifyEmailAddress($verificationCode){
    $result = "update fyidentitas set activeStatus= 'A' WHERE verificationCode =?";
    $this->db->query($result, array($verificationCode));
    return $this->db->affected_rows();
}

function sendForgotPass($email,$verificationCode,$username){
        // load library email
    $this->load->library('PHPMailerAutoload');

    $mail = new PHPMailer();
        //$mail->SMTPDebug = 2;
        //$mail->Debugoutput = 'html';

        // set smtp
    $mail->isSMTP();
    $mail->Host = 'alana.rapidplex.com';
    $mail->Port = '465';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'care@agivest.com';
    $mail->Password = 'r;7@]x54R4k]';
    $mail->WordWrap = 50;  
        // set email content
    $mail->setFrom('care@agivest.com', 'Agivest Team');
    $mail->addAddress($email);
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachment
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        //Konten
        $mail->Subject = 'Reset Password';
        $mail->Body = "
        <html>
        <head>
        <meta name='viewport' content='width=device-width'>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>Agivest</title>
        </head>
        <body bgcolor='#FFFFFF' style='margin: 0 auto;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;/*border: 3px solid #f9f9f9;*/height: 100%;width: 100%!important;'>
        <!-- HEADER -->
        <table class='head-wrap' bgcolor='#f9f9f9' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif; width: 100.3%;'>
        <tr style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <td style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'></td>
        <td class='header container' style='margin: 0 auto!important;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;'>

        <div class='content' style='margin: 0 auto;padding: 15px;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;max-width: 600px;display: block;'>
        <table bgcolor='#f9f9f9' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;width: 100%;'>
        <tr style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <td style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'><img src='http://www.agivest.com/assets/images/agivestLogo.png' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;width: 76px;max-width: 100%;'></td>
        <td align='right' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'><p style='font-size: 17px;color: #3f6ca4;margin: 0!important;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;margin-bottom: 6px;font-weight: normal;line-height: 1.6;' class='collapse'>Reset Password</p></td>
        </tr>
        </table>
        </div>
        </td>
        <td style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'></td>
        </tr>
        </table><!-- /HEADER -->

        <!-- BODY -->
        <table class='body-wrap' style='margin: 0;padding: 14px 0 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;width: 100%;'>
        <tr style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <td style='margin: 0;padding: 0;'></td>
        <td class='container' bgcolor='#FFFFFF' style='margin: 0 auto!important;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;'>
        <div class='content' style='margin: 0 auto;padding: 15px;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;max-width: 600px;display: block;'>
        <table style='padding-top: 15px;margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;width: 100%;'>
        <tr style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <td align='center' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <p align='center' style='font-size: 14px;margin: 0;padding: 0;line-height: 1.1;margin-bottom: 15px;color: #000;font-weight: 500;'>Hai $username!</p>
        <p align='center' style='line-height: 1.5; font-size: 14px;'>
        Silahkan klik link berikut untuk mereset password anda
        </p>
        <br>
        <a style='text-decoration: none; background-color: #03a9f4; color: #FFF; padding-left: 150px; padding-right: 150px; padding-top: 10px; padding-bottom: 10px;' type='submit' href='http://www.agivest.com/Forgot/reset/$verificationCode'>
        Reset Password
        </a>
        <br>
        </td>
        </tr>
        </table>

        </div><!-- /content -->
        </td>
        <td style='margin: 0;padding: 0;'></td>
        </tr>
        </table>

        <!-- FOOTER -->
        <table class='footer-wrap' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;width: 100%;clear: both!important;'>
        <tr style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <td style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'></td>
        <td class='container' style='margin: 0 auto!important;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;'>
        <!-- content -->
        <div class='content' style='margin: 0 auto;padding: 15px;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;max-width: 600px;display: block;'>
        <table style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;width: 100%;'>
        <tr>
        <td align='center'>
        <a href='https://www.instagram.com/tambaku.id/' target='_blank' style='color:#000;text-decoration: none'>
        <img style='width: 28px;height: 28px' src='http://www.agivest.com/assets/images/instagram.png' alt='' />
        </a>
        &nbsp;
        <a href='http://line.me/ti/p/@lae3620p' target='_blank' style='color:#000;text-decoration: none'>
        <img style='width: 28px;height: 28px' src='http://www.agivest.com/assets/images/line.png' alt='' />
        </a>
        </td>
        </tr>
        <tr style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <td align='center' style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'>
        <p style='margin: 0;padding: 0;font-family: Roboto, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;color: #757575'>
        <a href='http://www.agivest.com' style='margin: 0;padding: 0;font-family: Roboto, sans-serif;color: #000;'>www.agivest.com</a> &copy; 2016 | All Rights Reserved.
        <br />Gedung Equaloop Griyashanta Blok E-209 Kec. Lowokwaru, Kota Malang, Jawa Timur
        <br style='margin: 0;padding: 0;'>
        </p>
        </td>
        </tr>
        </table>
        </div><!-- /content -->
        </td>
        <td style='margin: 0;padding: 0;font-family:Helvetica Neue, Helvetica Helvetica, Arial, sans-serif;'></td>
        </tr>
        </table><!-- /FOOTER -->
        </body>
        </html>";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
    }

    function verifyPassword($verificationCode){
        $result = "update fyidentitas set activeStatusForgotPass = 'A' WHERE verificationCodeForgotPass =?";
        $this->db->query($result, array($verificationCode));
        return $this->db->affected_rows();
    }

}
?>