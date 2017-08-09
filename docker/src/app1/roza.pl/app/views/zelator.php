{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
    <p>Witaj {{auth.imie}} {{auth.nazwisko}}.</p>
    <p>Znajdujesz się w Panelu Zelatora KŻR. Oto lista kół, którymi się opiekujesz:</p>
    {% for k in kola %}
        <p><b>{{ k.kolo.nazwa}}</b><br>
            <u>Do koła należą następujący członkowie:</u><br>
            {% for u in k.czlonkowie %}
                <i>{{u.imie}} {{u.nazwisko}}<br></i>
            {% endfor %}
            <hr>
            <b>Wiadomości dla tego koła:</b>
            {% for w in k.wiadomosci%}
                <p>
                    <i>{{ w.naglowek}}</i><br>
                    {{ w.tresc }}
                </p>
            {% endfor%}
        </p>
    {% endfor %}
{% endblock %}

{% block content2 %}
    FORUMLARZ WYSYŁANIA WIADOMOŚCI
{% endblock %}