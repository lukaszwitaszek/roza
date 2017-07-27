{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
        <p>Witaj {{auth.imie}} {{auth.nazwisko}}</p>
        <p>Znajdujesz się w panelu zarządzania aplikacją dla KŻR.</p>
{% endblock %}

{% block content2 %}
    <p>W systemie są zarejestrowane następujące koła:</p>
    {% for i in kola %}
        <p>{{i.kolo.nazwa}}, prowadzone przez {{i.zelator.imie}} {{i.zelator.nazwisko}}.</p>
        <p><a href="{{ urlFor('admin.kolo.post')}}/{{i.kolo.id}}">edytuj</a></p><hr>
    {% endfor %}
    <hr>
    <form action="{{ urlFor('admin.kolo.post') }}" method="post" autocomplete="off">
        <div>
            <label for="nazwa">Podaj nazwę nowego koła:</label>
            <input type="text" name="nazwa" id="nazwa">
        </div>
        <div>
            <input type="submit" value="Dodaj">
        </div>
        <p>*** Przypisanie zelatora do dodawanego koła będzie możliwe w sekcji edycji uczestnikow Koła.</p>
        </form> 
    <hr>
    
{% endblock %}