<?php
namespace app\admin\controller;
use QL\QueryList;
class Note extends Common
{
	
    public function noteList(){
        //获取前缀
        $prefix=config('database.prefix');
        $modelName=$prefix.'model';
        $noteRes=db('note')->field('n.id,n.note_name,n.model_id,n.output_encoding,n.input_encoding,n.addtime,n.lasttime,m.model_name')->alias('n')->join("$modelName m",'n.model_id=m.id')->order('id desc')->paginate(4);
        $this->assign([
            'noteRes'=>$noteRes,
            ]);
        return view('list');
    }
    public function addlistrules()
    { 
       if(request()->isPost()){
          $_data=input('post.');
	      $data['note_name']=$_data['note_name'];
	      $data['model_id']=$_data['model_id'];
	      $data['output_encoding']=$_data['output_encoding'];
	      $data['input_encoding']=$_data['input_encoding'];
          $data['list_rules']=array(
            'list_url'=>$_data['list_url'],
            'start_page'=>$_data['start_page'],
            'end_page'=>$_data['end_page'],
            'step'=>$_data['step'],
            'range'=>$_data['range'],
            'list_rules'=>array(
                'url'=>$_data['url'],
                'litpic'=>$_data['litpic'],
                ),
            );
                      //列表页面采集规则
           $data['list_rules']=json_encode($data['list_rules']);
           $data['addtime']=time();
           $id=db('note')->insertGetId($data);//新添加数据并且获取到id主键
            if($id){
                $notes=db('note')->field('model_id')->find($id);
                $modelId=$notes['model_id'];
                $this->redirect('additemrules', ['model_id' => $modelId,'note_id'=>$id]);
            }else{
                $this->error('添加节点失败！');
            }
       }
         
    	$modelRes=db('model')->select();
        $this->assign([
            'modelRes'=>$modelRes,
            ]);
       return view(); 
    }

    public function additemrules()
    {       
    	    $noteId=input('note_id');
            if(request()->isPost()){
            $data=input('post.');
            // $rules=array();
            // if($data){
            //     foreach ($data as $k => $v) {
            //             $rules[$k][0]=$v[0];
            //             $rules[$k][1]=$v[1];
            //             $rules[$k][2]=$v[2];
            //             array_values($rules[$k]);
                    
            //     }
            // }
            $rules=json_encode($data);
            $save=db('note')->where(array('id'=>$noteId))->update(['item_rules'=>$rules]);
            if($save){
                $this->success('添加节点成功！','noteList');
            }else{
                $this->error('添加节点失败');
            }
            return;
        }
    	$modelId=input('model_id');
    	$modelFieldRes=db('model_fields')->field('field_cname,field_ename')->where(array('model_id'=>$modelId))->select();
        $this->assign([
            'modelFieldRes'=>$modelFieldRes,
            ]);
    	return view();
    }
    //采集页面
    public function showcaiji(){
        $id=input('id');
        $note=db('note')->field('note_name,model_id')->find($id);
        $note_name=$note['note_name'];
        $modelId=$note['model_id'];
        $_cateRes=db('cate')->select();
        $cateRes=model('cate')->catetree($_cateRes);
        $this->assign(
          array(
             'note_name'=>$note_name,
             'cateRes'=>$cateRes,
             'id'=>$id,
             'modelId'=>$modelId
            )

            );
        return view();
    }
    //采集
    public function docaiji(){
        $id=input('id');
        $notes=db('note')->find($id);
        //采集名字
        $natename=$notes['note_name'];
        //所属模型
        $modelid=$notes['model_id'];
        //输出编码
        $outputencoding=$notes['output_encoding'];
        //输入编码
        $inputencoding=$notes['input_encoding'];
        //列表规则
        $listrules=json_decode($notes['list_rules'],true);
        //动态读取列表采集规则
        $baseUrl="http://hj.9899101.com/";
        $listCaijiRules=array(
            'url'=>array($listrules['list_rules']['url'],'href','',function($content) use($baseUrl){
            return $baseUrl.$content;}),
            'litpic'=>array($listrules['list_rules']['litpic'],'src','',function($content) use($baseUrl){
            return $baseUrl.$content;}),
            );
        //内容规则
        $itemrules=json_decode($notes['item_rules'],true);
        $listurl=$listrules['list_url'];
        //开始
        $startpage=$listrules['start_page'];
        //结束
        $endpage=$listrules['end_page'];
        //步长
        $step=$listrules['step'];
        //采集范围
        $range=$listrules['range'];
        $_listUrl=array();
        for ($startpage; $startpage <= $endpage; $startpage=$startpage+$step) { 
            $_listUrl[]=str_replace('(*)', $startpage, $listurl);
        }
       $_data=[];
       foreach($_listUrl as $k=>$v){
        $_data[]=QueryList::Query($v,$listCaijiRules,$range,$outputencoding,$inputencoding)->data;
       }
        $dataList=[];
       foreach($_data as $k=>$v){
        foreach($v as $k1=>$v1){
          $dataList[]=$v1;
        }
       }
       $_dataItem=[];
       foreach($dataList as $k=>$v){
        $_dataItem[]=QueryList::Query($v['url'],$itemrules,'',$outputencoding,$inputencoding)->data;
        $_dataItem[$k][0]['url']=$v['url'];//手动添加url到数组，目的是写入临时表中
        $_dataItem[$k][0]['litpic']=$v['litpic'];//列表采集的缩略图
       }

       //数据重构
       $dataItem=[];
        foreach($_dataItem as $k=>$v){
            foreach($v as $k1=>$v1){
              $dataItem[]=$v1;
            }
        }
        // dump($dataItem);die;

        foreach ($dataItem as $k => $v) {
            $data['nid']=$id;
            $data['title']=$v['title'];
            //防止重复采集
            $reData=db('html')->where(array('title'=>$data['title']))->find();
            if($reData){
                continue;
            }
            $data['url']=$v['url'];
            $data['addtime']=time();
            $data['result']=json_encode($v);
            db('html')->insert($data);
        }
                 //节点最后采集时间
        db('note')->where(array('id'=>$id))->update(['lasttime'=>time()]);
       echo 1;//采集完成
    }
//数据重构
     public function exportdata(){
        $id=input('id');
        $cateId=input('cate_id');
        $cate=db('cate')->field('model_id')->find($cateId);
        $modelId=$cate['model_id'];//动态获取模型id
        $model=db('model')->field('table_name')->find($modelId);
        $tableName=$model['table_name'];
        $html=db('html')->where(array('nid'=>$id,'export'=>0))->select();
         $arr=array('title','keywords','description','writer','source','content','litpic','url');
        $_archives=[];//主表元素数组
        $_addTable=[];//附加表元素数组
        $i=0;
        foreach($html as $k=>$v){
            $_html=json_decode($v['result'],true);
            foreach($_html as $k1=>$v1){
                if(in_array($k1,$arr)){
                    $_archives[$k1]=$v1;
                    if($k1=='url'){
                        unset($_archives[$k1]);
                    }
                }else{
                    $_addTable[$k1]=$v1;
                }

            }
           $_archives['cate_id']=$cateId;
           $_archives['model_id']=$modelId;
           $_archives['time']=time();
           $addId=db('archives')->insertGetId($_archives);
           $_addTable['aid']=$addId;
           db($tableName)->insert($_addTable);
           db('html')->where(array('id'=>$v['id']))->update(['export'=>1]);
           $i++;
           if(($i%6)==0){
            sleep(3);
           }
        }
        echo 1;

     }
         public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            $base=[];
            $base['id']=$data['id'];
            $base['note_name']=$data['note_name'];
            $base['model_id']=$data['model_id'];
            $base['output_encoding']=$data['output_encoding'];
            $base['input_encoding']=$data['input_encoding'];
            $base['list_rules']['list_url']=$data['list_url'];
            $base['list_rules']['start_page']=$data['start_page'];
            $base['list_rules']['end_page']=$data['end_page'];
            $base['list_rules']['step']=$data['step'];
            $base['list_rules']['range']=$data['range'];
            $base['list_rules']['list_rules']['url']=$data['url'];
            $base['list_rules']['list_rules']['litpic']=$data['litpic'];
            $base['list_rules']=json_encode($base['list_rules']);
            $arr=array('note_name','model_id','output_encoding','input_encoding','list_url','start_page','end_page','step','range','url','litpic','id');
            foreach ($data as $k => $v) {
                if(in_array($k, $arr)){
                    unset($data[$k]);
                }
            }
            $base['item_rules']=json_encode($data);
            $save=db('note')->update($base);
            if($save!==false){
                $this->success('修改节点成功！','noteList');
            }else{
                $this->error('修改节点失败！');
            }
            return;
        }
        $notes=db('note')->find($id);
        $listRules=json_decode($notes['list_rules'],true);
        $itemRules=json_decode($notes['item_rules'],true);
        $modelId=$notes['model_id'];
        //根据模型id获取模型名称
        $models=db('model')->field('model_name')->find($modelId);
        $modelName=$models['model_name'];
        $modelRes=db('model')->select();
         //自定义模型字段
        $modelFieldRes=db('model_fields')->field('field_cname,field_ename')->where(array('model_id'=>$modelId))->select();
        $this->assign([
            'modelRes'=>$modelRes,
            'modelFieldRes'=>$modelFieldRes,
            'notes'=>$notes,
            'modelId'=>$modelId,
            'modelName'=>$modelName,
            'listRules'=>$listRules,
            'itemRules'=>$itemRules,
            'id'=>$id,//节点id
            ]);
        return view();
    }
    
    //删除节点
    public function del($id){
        $del=db('note')->delete($id);
        if($del){
           db('html')->where(array('nid'=>$id))->delete();
           $this->success('删除节点成功！','noteList'); 
        }else{
            $this->error('删除节点失败！');
        }
    }
    }


