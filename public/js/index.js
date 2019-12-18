// 削除時の処理
$("#delete_todo").click(function(){
    if(confirm("本当に削除しますか？")){
        document.getElementById('delete_todo_form').submit()
    }else{
        return false;
    }
});

$("#edit_todo").click(function(){
    if(confirm("編集しますか？")){
        document.getElementById('edit_todo_form').submit()
    }else{
        return false;
    }
});


