{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
    <p>Witaj {{auth.imie}} {{auth.nazwisko}}.</p>
    <p>Znajdujesz się w Panelu Zelatora KŻR. Jesteś zelatorem w kole:</p>

        <p><b>{{daneKola.kolo.nazwa}}</b><br>
            <u>Do koła należą następujący członkowie:</u><br>
            {% for u in daneKola.czlonkowie %}
                <i>{{u.imie}} {{u.nazwisko}}<br></i>
            {% endfor %}
            <hr>
            <b>Wiadomości dla tego koła:</b>
            {% for w in daneKola.wiadomosci%}
                <p>
                    <i>{{ w.naglowek}}</i><br>
                    {{ w.tresc }}
                </p>
            {% endfor%}
        </p>

{% endblock %}

{% block content2 %}
    FORUMLARZ WYSYŁANIA WIADOMOŚCI
{% endblock %}