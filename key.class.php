<?php
class KEY {
    private $expire = 0, $key = 'secret';

    public function __construct($key_str = null, $time_to_live = null) {
        if ($key_str) {
            self::setKey($key_str);
        }
        if ($time_to_live) {
            self::setExpire($time_to_live);
        }
    }

    public  function setExpire($time_to_live) {
        $this->expire = floatval($time_to_live);
    }

    public  function setKey($key_str) {
        $this->key = (string) $key_str;
    }

    public  function encode($tex, $key = null, $expire = 0) {
        $key = $key ? $key : $this->key;
        $expire = $expire ? $expire : $this->expire;
        $chrArr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $tex.="~#~" . sprintf('%010d', $expire ? $expire + time() : 0) . "~#~";
        $key_b = $chrArr[rand() % 62] . $chrArr[rand() % 62] . $chrArr[rand() % 62] . $chrArr[rand() % 62] . $chrArr[rand() % 62] . $chrArr[rand() % 62];
        $rand_key = $key_b . $key;
        $rand_key = md5($rand_key);
        $texlen = strlen($tex);
        $reslutstr = "";
        for ($i = 0; $i < $texlen; $i++) {
            $reslutstr.=$tex{$i} ^ $rand_key{$i % 32};
        }
        $reslutstr = trim($key_b . base64_encode($reslutstr), "==");
        $reslutstr = substr(md5($reslutstr), 0, 8) . $reslutstr;
        return $reslutstr;
    }

    public  function decode($tex, $key = null) {
        $key = $key ? $key : $this->key;
        if (strlen($tex) < 14)
            return false;
        $verity_str = substr($tex, 0, 8);
        $tex = substr($tex, 8);
        if ($verity_str != substr(md5($tex), 0, 8)) {
            //完整性验证失败
            return false;
        }
        $key_b = substr($tex, 0, 6);
        $rand_key = $key_b . $key;
        $rand_key = md5($rand_key);
        $tex = base64_decode(substr($tex, 6));
        $texlen = strlen($tex);
        $reslutstr = "";
        for ($i = 0; $i < $texlen; $i++) {
            $reslutstr.=$tex{$i} ^ $rand_key{$i % 32};
        }
        $expiry_arr = array();
        preg_match('/^(.*)~#~(\d{10})~#~$/', $reslutstr, $expiry_arr);
        if (count($expiry_arr) != 3) {
            //过期时间完整性验证失败
            return false;
        } else {
            $tex_time = $expiry_arr[2];
            if ($tex_time > 0 && $tex_time - time() <= 0) {
                //验证码过期
                return false;
            } else {
                $reslutstr = $expiry_arr[1];
            }
        }
        return $reslutstr;
    }

} 
?>