// Funkcja przechodzi do URL po potwierdzeniu przez użytkownika
function confirmLink(link, message) {
    if (confirm(message)) {
        window.location.href = link;
    }
}

// Wysyła formularz AJAXem i wstawia odpowiedź do podanego elementu
function ajaxPostForm(id_form, url, id_to_reload) {
    var form = document.getElementById(id_form);
    var formData = new FormData(form);
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        }
    };

    xmlHttp.open("POST", url, true);
    xmlHttp.send(formData);
}

// Wysyła formularz AJAXem i po odpowiedzi wywołuje funkcję użytkownika
function ajaxPostFormEx(id_form, url, user_function) {
    var form = document.getElementById(id_form);
    var formData = new FormData(form);
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            user_function();
        }
    };

    xmlHttp.open("POST", url, true);
    xmlHttp.send(formData);
}

// Pobiera zawartość z adresu i wstawia ją do elementu (opcjonalnie cyklicznie)
function ajaxReloadElement(id_element, url, interval = 0) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id_element).innerHTML = this.responseText;
            if (interval > 0)
                setTimeout(function () {
                    ajaxReloadElement(id_element, url, interval);
                }, interval);
        }
    };

    xhttp.open("GET", url, true);
    xhttp.send();
}
