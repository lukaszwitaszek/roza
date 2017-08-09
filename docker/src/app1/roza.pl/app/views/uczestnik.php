{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
    <p>Witaj {{auth.imie}} {{auth.nazwisko}}</p>
    <p>Znajdujesz się w panelu zarządzania uczestnikami KŻR.</p>
    {% if usInfo%}
        <p>W systemie zarejestrowano następujących uczestników:<br>
            {% for u in usInfo %}
                {{u.uczestnik.imie}} {{u.uczestmik.nazwisko}}, będącego członkiem koła {{u.kolo}}<br>
            {% endfor %}
        </p>
    {% else %}
        <p>Szczegóły dotyczące uczestnika:</p>
        <p>{{uInfo.uczestnik.imie}} {{uInfo.uczestnik.nazwisko}}, przynależy do {{uInfo.kolo}}</p>
        <p>Uczestnik przesłał następujące wiadomości:<br>
            {{uInfo.wiadomosci[0]}}
        </p>
    {% endif%}
{% endblock %}

{% block content2 %}
    FORMULARZ DODAWANIA UCZESTNIKA
    <form action="{{urlFor('uczestnik.post')}}/0" method="post" autocomplete="off">
        <div>
            <label for="imie">Podaj imię</label>
            <input type="text" name="imie" id="imie">
                {% if errors.first('imie') %} {{ errors.first('imie') }}{% endif %}
            <br>
            <label for="nazwisko">Podaj nazwisko</label>
            <input type="text" name="nazwisko" id="nazwisko">
                {% if errors.first('nazwisko') %} {{ errors.first('nazwisko') }}{% endif %}
            <br>
            <label for="email">Podaj adres email</label>
            <input type="email" name="email" id="email">
                {% if errors.first('email') %} {{ errors.first('email') }}{% endif %}
            <br>
            <label for="telefon">Podaj nr telefonu</label>
            <input type="text" name="telefon" id="telefon">
                {% if errors.first('telefon') %} {{ errors.first('telefon') }}{% endif %}
            <br>
            <label for="admin">Administrator</label>
            <input type="checkbox" name="admin" id="admin" value="1">
            <label for="zelat">Zealtor</label>
            <input type="checkbox" name="zelat" id="zelat" value="1">
            <select name="zelatowane_kolo">
                {% for zk in kola %}
                    <option value="{{zk.id}}">{{zk.nazwa}}</option>
                {% endfor%}
            </select>
            <br>
            <label for="password">Podaj hasło</label>
            <input type="password" name="password" id="password">
            {% if errors.first('password') %} {{ errors.first('password') }}{% endif %}
        </div>
        <div>
            <input type="submit" value="Dodaj">
        </div>
    </form>
    
{% endblock %}