<?php 

class Index 
{
    public function createQuery()
    {
        $query = '';

        for($i = 0;$i <= 5;$i++){
			$random = mt_rand(48, 122);
			if(($random <= 64) && ($random >= 58)) 
    			$random += mt_rand(7, 26);
            elseif(($random <= 96) && ($random >= 91)) 
				$random += mt_rand(6, 26);
            
			$query .= chr($random);
        }

        return $query;
    }

    public function checkLink(&$correct, &$number, $url)
    {

		while(($correct < $number)){

			if((ord($url[$correct]) == 32) || (ord($url[$correct]) == 34) || (ord($url[$correct]) == 39) || (ord($url[$correct]) == 60) || (ord($url[$correct]) == 62))
				{
				echo '<div class="call-12"><div class="color-red mar-tb-5 pad-15 panel-round-l size-text-20">
					<span class="color-text-blue">#</span> Xin lỗi, liên kết của bạn vừa nhập có chứa ký tự không hợp lệ, vui lòng kiểm tra lại liên kết và thử lại một lần nữa !<br />(Ký tự không hợp lệ: \' " < >).
					</div></div>';
				break;
				}
			$correct++;
		}

		if (($url == '') || ($number <= 4) || (strpos($url, " ") != false) || (strpos($url, ".") == false) || ($url[$number - 1] == ' ') || ($url[$number - 1] == '.') || ($url[0] == ' ') || ($url[0] == '.'))
			{
			echo '<div class="call-12"><div class="color-red mar-tb-5 pad-15 panel-round-l size-text-20">
				<span class="color-text-blue">*</span> Xin lỗi, nếu bạn đang có ý định tấn công trang web này, xin vui lòng dừng lại.</div></div>';
			$correct -= $number;
			}
	}

}
$index = new Index();