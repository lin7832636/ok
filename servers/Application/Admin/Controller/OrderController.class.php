<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends PrivateController {
    public function shows() {
        $date=date("Y-m-d",strtotime('-7 days'));
        $tt=strtotime($date);
        $order=M("order")->where("addtime>=$tt")->select();
        $user=M("user")->field('user_id,usertelno')->select();
        foreach($order as $k=>$v){
            if($v['pay_type']==0){
                $order[$k]['pay_type']="银联";
            }else if($v['pay_type']==1){
                $order[$k]['pay_type']="支付宝";
            };
            if($v['order_status']==1){
                $order[$k]['order_status']="已生成";
            }else if($v['order_status']==2){
                $order[$k]['order_status']="已支付";
            }else if($v['order_status']==3){
                $order[$k]['order_status']="已取消";
            }else if($v['order_status']==4){
                $order[$k]['order_status']="作废";
            }else if($v['order_status']==5){
                $order[$k]['order_status']="订单完成";
            }else if($v['order_status']==6){
                $order[$k]['order_status']="已退款";
            }else if($v['order_status']==7){
                $order[$k]['order_status']="已部分退款";
            };
            foreach($user as $kk=>$vv){
                if($v['user_id']==$vv['user_id']){
                    $order[$k]['usertelno']=$vv['usertelno'];
                }
            }
        };
        $this->assign("order",$order);
        $this->display();
    }
}