<?php

//过确定一个 Key 最大或最小值，再从带排序的的数中找出最大或最小的交换到对应位置
//过确定一个 Key 最大或最小值，再从带排序的的数中找出最大或最小的交换到对应位置
function select_sort($arr)
{
	$len = count($arr);
	$nums = 0;

	for ($idx_sorted = 0; $idx_sorted < $len-1; $idx_sorted++) {
		$min = $arr[$idx_sorted];
		$min_idx = $idx_sorted;

		for ($j = $idx_sorted; $j < $len; $j++) {

			$nums ++;
			//发现有值等于排好的值
			if ($idx_sorted > 0 && $arr[$j] == $arr[$idx_sorted -1]) {
				$min_idx = $j;
				break;
			}

			if($arr[$j] < $min) {
				$min = $arr[$j];
				$min_idx = $j;
			}
		}

		if ($min_idx == $idx_sorted) {
		    continue;
		}

		$tmp = $arr[$idx_sorted];
		$arr[$idx_sorted] = $arr[$min_idx];
		$arr[$min_idx] = $tmp;

	}

	echo sprintf('%s 运行次数： %d'.PHP_EOL, __FUNCTION__, $nums);

	return $arr;
}


function quick_sort2(&$arr, $left, $right)
{
    /*如果左边索引大于或者等于右边的索引就代表已经整理完成一个组了*/
    if($left >= $right) {
        return ;
    }
    $i = $left;
    $j = $right;
    //中间值取left第一个元素
    $key = $arr[$left];
     
    while($i < $j)                               
    {
    	//右边值都>中间值，继续，否则找出第一个小于的数值
        while($i < $j && $key <= $arr[$j]) {
            $j--;
        }
         
        $arr[$i] = $arr[$j];
        
        //同样left也寻找一个大值填空 
        while($i < $j && $key >= $arr[$i]) {
            $i++;
        }
         
        $arr[$j] = $arr[$i];
    }
    /*当在当组内找完一遍以后就把中间数key回归*/ 
    $arr[$i] = $key;
    /*最后用同样的方式对分出来的左边的小组进行同上的做法*/
    quick_sort2($arr, $left, $i - 1);
    /*用同样的方式对分出来的右边的小组进行同上的做法*/
    quick_sort2($arr, $i + 1, $right);
    /*当然最后可能会出现很多分左右，直到每一组的i = j 为止*/
}


$arr = [1,3,43,42,12,53,353,466,86,5,643,3,4532,23, 42];

$res = select_sort($arr);
echo implode(',', $res).PHP_EOL;



/**
bubble_sort 运行次数： 196
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
bubble_sort_2 运行次数： 140
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
bubble_sort_3 运行次数： 127
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
select_sort 运行次数： 116
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
**/