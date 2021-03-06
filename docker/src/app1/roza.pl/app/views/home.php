{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
    {% if auth %}
        <p>Witaj {{auth.imie}} {{auth.nazwisko}}</p>
        <p>Aktualna tajemnica, którą się modlisz: <i>{{tajemnica.nazwa}}</i>.</br>{{tajemnica.opis}}</p>
        <p>Koło ŻR, którego jesteś członkiem: <i>{{kolo.nazwa}}</i>.</br>Zelatorem jest <b>{{zelator}}</b>.</p>
    {% else %}
        <p>Witaj na stronie Wspólnoty Żywego Różańca</p>
    {% endif %}
{% endblock %}

{% block content2 %}
    {% if auth %}
        <p>Wiadomości przeznaczone dla twojego koła:</p>
        {% for item in wiadomosc %}
            <p>{{item.naglowek}}, wysłana {{item.updated_at}}<br/>{{item.tresc}}</p>
        {% endfor %}
    {% else %}
        Uzyskaj dostęp do informacji dla członków Koła.</br>
        <form action="{{ urlFor('home.post') }}" method="post" autocomplete="off">
        <div>
            <label for="identifier">Podaj adres e-mail</label>
            <input type="text" name="email" id="email" {% if request.post('email') %}    value="{{ request.post('email') }}" {% endif %}>
            {% if errors.first('email') %} {{ errors.first('email') }}{% endif %}
        </div>
        <div>
            <input type="submit" value="Wejdź">
        </div>
        </form>
    {% endif %}
{% endblock %}