// 削除時の処理
$("#js-delete_todo").click(function(){
    if(confirm("本当に削除しますか？")){
        document.getElementById('delete_todo_form').submit()
    }else{
        return false;
    }
});


// 編集時
$("#js-edit_todo").click(function(){
    if(confirm("編集しますか？")){
        document.getElementById('edit_todo_form').submit()
    }else{
        return false;
    }
});


// 計測開始
$("#js-started_at").click(function(){
    document.getElementById('started_at_form').submit()
});

// doneフラグを更新時
function updateDone() {
    if (document.getElementById("js-update_done").checked) {
        document.getElementById('update_done_form').submit()
    }
}


