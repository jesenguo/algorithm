<?php

function quickSort(&$arr, &$num)
{
    $len = count($arr);

    if ($len <= 1) {
        return $arr;
    }
    
    $middle = $arr[0];
    $x=array();
    $y=array();

    for ($i = 1; $i < $len; $i++) {
        $num ++;
        if ($arr[$i] <= $middle) {
            $x[] = $arr[$i];
        }elseif($arr[$i] > $middle){
            $y[] = $arr[$i];
        }
    }
    $x=quickSort($x, $num);
    $y=quickSort($y, $num);
    return array_merge($x,array($middle),$y);
}

function quick_sort2( &$arr, $left, $right)
{
    /*如果左边索引大于或者等于右边的索引就代表已经整理完成一个组了*/
    if($left >= $right) {
        return ;
    }
    $i = $left;
    $j = $right;
    $key = $arr[$left];
     
    /*控制在当组内寻找一遍*/
    while($i < $j)                               
    {
        while($i < $j && $key <= $arr[$j]) {
        /*而寻找结束的条件就是，1，找到一个小于或者大于key的数（大于或小于取决于你想升
        序还是降序）2，没有符合条件1的，并且i与j的大小没有反转*/ 
            $j--;/*向前寻找*/
        }
         
        $arr[$i] = $arr[$j];
        /*找到一个这样的数后就把它赋给前面的被拿走的i的值（如果第一次循环且key是
        a[left]，那么就是给key）*/
         
        while($i < $j && $key >= $arr[$i])
        /*这是i在当组内向前寻找，同上，不过注意与key的大小关系停止循环和上面相反，
        因为排序思想是把数往两边扔，所以左右两边的数大小与key的关系相反*/
        {
            $i++;
        }
         
        $arr[$j] = $arr[$i];
    }
     
    $arr[$i] = $key;/*当在当组内找完一遍以后就把中间数key回归*/
    quick_sort2($arr, $left, $i - 1);/*最后用同样的方式对分出来的左边的小组进行同上的做法*/
    quick_sort2($arr, $i + 1, $right);/*用同样的方式对分出来的右边的小组进行同上的做法*/
                       /*当然最后可能会出现很多分左右，直到每一组的i = j 为止*/
}

$arr = [1,3,43,42,12,53,353,466,86,5,643,3,4532,23, 42];

$num = 0;
$res = quickSort($arr, $num);
echo implode(',', $res).PHP_EOL;
echo sprintf('%s 运行次数： %d'.PHP_EOL, 'quickSort', $num);

$res = quick_sort2($arr, 0, count($arr)-1);
echo implode(',', $arr).PHP_EOL;

