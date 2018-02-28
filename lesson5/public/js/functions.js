function sendFileAjax($url) {
  var fd = new FormData;

  /* AJAX */
  $.ajax({
    method: 'POST',
    url: $url,
    contentType: 'multipart/form-data',
    success: function (data) {
      return data;
    },
    error: function (error) {
      alert('Ошибка ajax' + error);
    }
  });
}