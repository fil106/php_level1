function showChoosenImage(input) {

  var files = input.files || input.currentTarget.files;

  var reader = [];
  var images = document.getElementById('images');
  var name;

  if(files[0]['type'] === 'image/jpeg' || files[0]['type'] === 'image/png') {
    for (var i in files) {
      if (files.hasOwnProperty(i)) {
        name = 'file' + i;

        reader[i] = new FileReader();
        reader[i].readAsDataURL(input.files[i]);

        images.innerHTML += '<img class="choosenImage" id="'+ name +'" src="" />';

        (function (name) {
          reader[i].onload = function (e) {
            console.log(document.getElementById(name));
            document.getElementById(name).src = e.target.result;
          };
        })(name);

        console.log(files[i]);
      }
    }
  } else {
    console.log('Выбранный файл не является картинкой формата JPEG или PNG');
  }
}