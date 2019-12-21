var LogoutButton = document.getElementById('logout-btn');

function LogoutUser() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'logout.php?auth=logout', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            var json = JSON.parse(result);
            var location = json.redirect;
            window.location.href = location;
        }
    }
    xhr.send();
}

LogoutButton.addEventListener('click', function(event){
    event.preventDefault();
    LogoutUser();
});