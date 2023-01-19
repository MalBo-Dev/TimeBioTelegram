<?php
// @CodeSPHP

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
include("jdf.php");
#کرون جاب ست شود
#نوشته شده : 
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->async(false);
$MadelineProto->start();

$me = $MadelineProto->getSelf();

$MadelineProto->logger($me);

if (!$me['bot']) {
    try {
        date_default_timezone_set('Asia/Tehran');
        $time = date("H:i");
        $fonts = [["⁰", "₁", "²", "₃", "⁴", "₅", "⁶", "₇", "⁸", "₉"]];
        $time = date("H:i");
        $time2 = str_replace(range(0, 9), $fonts[array_rand($fonts)], jdate('H:i'));
	$MadelineProto->account->updateProfile(['last_name' => " | $time2 :)"]);
        $MadelineProto->account->updateProfile(['about' => "فضولی شما در تاریخ ".jdate('Y/m/d')." در روز ".jdate('l')." ساعت ".jdate('H:i')." ثبت شد 😂🤣"]);
    } catch (\danog\MadelineProto\RPCErrorException $e) {
        $MadelineProto->logger($e);
    }
}
$MadelineProto->echo('OK, done!');
