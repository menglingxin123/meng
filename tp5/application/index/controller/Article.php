<?php
namespace app\index\controller;
class Article extends Common
{
    public function index($aid)
    {
        $arts=db('archives')->find($aid);
        $cid=$arts['cate_id'];
        $cates=db('cate')->find($cid);
        //获取对应的附加表的名称
        $models=db('model')->field('table_name')->find($cates['model_id']);
        $addTableName=$models['table_name'];
        $arts=db('archives')->alias('a')->join("$addTableName b",'a.id=b.aid')->find($aid);
        $artTmp=$cates['article_tmp'];
        $tempSrc=$this->confTemp.'/'.$artTmp;
        // echo $tempSrc; die;
        //顶级栏目id获取
        $topcid=model('Cate')->getTopId($cid);
        $topCates=db('cate')->find($topcid);//顶级栏目信息
        //查询二级栏目
        $sonCateRes=db('Cate')->where(array('pid'=>$topcid))->where(array('status'=>1))->select();//根据主栏目id获取当前主栏目下所有二级栏目
        //面包屑
        $pos=model('Cate')->position($cid);
        $this->assign([
            'arts'=>$arts,
            'topcid'=>$topcid,
            'cid'=>$cid,
            'topCates'=>$topCates,
            'sonCateRes'=>$sonCateRes,
            'curCates'=>$cates,
            'position'=>$pos,
            ]);
        return $this->fetch($tempSrc);
    }
}
