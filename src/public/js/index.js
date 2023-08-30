$(function() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
  // token生成

  $(".todo-status-button").change(function () {
    // ↑のタグに変化(change)があった時に実行される。
    const content = $(this).val(); // $(this)はチェックボタンのタグ(inputタグのこと)。val()がinputタグのvalue(= $todo->content)
    const url = $(this).parent(".todo-status-form").attr("action");
    // urlプロパティにformタグの情報を代入している。
    $.ajax(
      url,
      {
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken }
      }
      // ajaxの関数を使用することで、非同期通信が可能。ヘッダにトークン、POSTメソッドで通信
    )
    // ↓非同期通信(ajax)が成功したら実行される
    .done(function(data) {
      // console.log(data);
      if (data.is_completed) {
        window.alert('「' + content + '」のToDoを完了にしました。');
      } else {
        window.alert('「' + content + '」のToDoの完了を取り消しました。');
      }
    })
    // ↓非同期通信(ajax)が失敗したら実行される
    .fail(function() {
      window.alert('通信に失敗しました。');
    });
  });
});