function mynewestFunction() {
var btn = document.getElementById('Upload');
btn.addEventListener('click', function() {
  document.location.href = 'form.php';
});
}

function mynewestFunction2() {
var btn = document.getElementById('View');
btn.addEventListener('click', function() {
  document.location.href = 'status.php';
});
}

function mynewestFunction3() {
var btn = document.getElementById('delete');
btn.addEventListener('click', function() {
  document.location.href = 'deletion.php';
});
}

function mynewestFunction4() {
var btn = document.getElementById('update');
btn.addEventListener('click', function() {
  document.location.href = 'updation.php';
});
}


function myFunction() {
location.replace("logout.php")
}
