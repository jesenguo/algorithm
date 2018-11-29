<?php

//冒泡排序的原理：一组数据，比较相邻数据的大小，将值小数据在前面，值大的数据放在后面。

function bubble_sort($arr)
{
	$len = count($arr);

	$sort_count = 0;
	$nums = 0;

	while ($sort_count != $len - 1) {
		for ($i = 0; $i < $len-1; $i++) {
			$nums ++;
			if ($arr[$i] <= $arr[$i+1]) {
				continue;
			} else {
				$tmp = $arr[$i+1];
				$arr[$i+1] = $arr[$i];
				$arr[$i] = $tmp;
			}
		}
		$sort_count ++;	
	}
	echo sprintf('%s 运行次数： %d'.PHP_EOL, __FUNCTION__, $nums);
	return $arr;
}

//优化1，当有一次遍历，元素么有发生变化时，排序结束
function bubble_sort_2($arr)
{
	$len = count($arr);

	$sort_count = 0;
	$nums = 0;
	

	while ($sort_count != $len - 1) {

		$is_sorted = true;
		for ($i = 0; $i < $len-1; $i++) {
			$nums ++;
			if ($arr[$i] > $arr[$i+1]) {
				$tmp = $arr[$i+1];
				$arr[$i+1] = $arr[$i];
				$arr[$i] = $tmp;
				$is_sorted = false;
			}
		}
		$sort_count ++;	
		if ($is_sorted) {
			break;
		}

	}
	echo sprintf('%s 运行次数： %d'.PHP_EOL, __FUNCTION__, $nums);
	return $arr;
}

//优化2 定义已排序的边界， 接触边界时退回
function bubble_sort_3($arr)
{
	$len = count($arr);

	$sort_count = 0;
	$nums = 0;
	$last_modified = 0;
	

	while ($sort_count != $len - 1) {

		$is_sorted = true;
		for ($i = 0; $i < $len-1; $i++) {
			$nums ++;
			if ($i == $last_modified - 1) {
				break;
			}
			if ($arr[$i] > $arr[$i+1]) {
				$tmp = $arr[$i+1];
				$arr[$i+1] = $arr[$i];
				$arr[$i] = $tmp;
				$is_sorted = false;
				$last_modified = $i < $last_modified ?: $i+1;
			}
		}
		$sort_count ++;	
		if ($is_sorted) {
			break;
		}

	}
	echo sprintf('%s 运行次数： %d'.PHP_EOL, __FUNCTION__, $nums);
	return $arr;
}

$arr = [1,3,43,42,12,53,353,466,86,5,643,3,4532,23, 42];

$res = bubble_sort($arr);
echo implode(',', $res).PHP_EOL;
$res = bubble_sort_2($arr);
echo implode(',', $res).PHP_EOL;
$res = bubble_sort_3($arr);
echo implode(',', $res).PHP_EOL;

/**
bubble_sort 运行次数： 196
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
bubble_sort_2 运行次数： 140
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
bubble_sort_3 运行次数： 127
1,3,3,5,12,23,42,42,43,53,86,353,466,643,4532
**/