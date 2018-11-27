<?php


/**
 * 递归版本，严重性能问题
 *
 * @param unknown $arr_source
 * @param unknown $top_save
 * @param unknown $level
 * @param unknown $n
 * @param unknown $zuhe
 * @return boolean
 */
/*function level($arr_source, $top_save, $level, $n, &$zuhe)
{
	$len = count($arr_source);
	for ($i=0; $i < $len; $i++) {
		if (in_array($arr_source[$i], $top_save)) {
			continue;
		} else {
			if ((count($top_save) == $n - 1) || $n == $level) {
				$zuhe[] = implode('', $top_save).$arr_source[$i];
				$level = $n;
			} else {
			    $level = count($top_save) + 1;
			    $top_save[$level] = $arr_source[$i];
			    if (!level($arr_source, $top_save, $level, $n, $zuhe)) {
			        return false;
			    }
			}
		}
	}

	reset:
	for ($j=count($top_save); $j > 0 ; $j--) {

		$cur_idx = array_search($top_save[$j], $arr_source);
		if ($cur_idx == $len - 1) {
			if ($j == 1) {
				return false ;
			}
			unset($top_save[$j]);
			goto reset;
		} else {
		    $next = $arr_source[$cur_idx+1];
		    if (in_array($next, $top_save)) {
		        $top_save[$j] = $next;
		        goto reset;
		    }
			$top_save[$j] = $next;
			if (!level($arr_source, $top_save, count($top_save), $n, $zuhe)) {
			    return false;
			}
		}
	}
	return false;
}*/

/**
 * 求m个不重复字符串中n个的排列组合

 * @param unknown $arr_source
 * @param unknown $top_save
 * @param unknown $n
 * @param unknown $rows
 */
function combination($str, $n, &$rows)
{
    $arr_source = str_split($str);
    $len = count($arr_source);
    $top_save = [];

    start:
    for ($i=0; $i < $len; $i++) {
        if (in_array($arr_source[$i], $top_save)) {
            continue;
        } else {
            if ((count($top_save) == $n - 1)) {
                $rows[] = implode('', $top_save).$arr_source[$i];
                $level = $n;
            } else {
                $level = count($top_save) + 1;
                $top_save[$level] = $arr_source[$i];
                goto start;
            }
        }
    }

    reset:
    for ($j=count($top_save); $j > 0 ; $j--) {
        $cur_idx = array_search($top_save[$j], $arr_source);
        if ($cur_idx == $len - 1) {
            if ($j == 1) {
                return ;
            }
            unset($top_save[$j]);
            goto reset;
        } else {
            $next = $arr_source[$cur_idx+1];
            if (in_array($next, $top_save)) {
                $top_save[$j] = $next;
                goto reset;
            }
            $top_save[$j] = $next;
            goto start;
        }
    }
    return ;
}

set_time_limit(-1);
$rows = [];
combination('abcdefghijklmnopqrstuv123456', 3, $rows);
echo '<pre>';
print_r($rows);

