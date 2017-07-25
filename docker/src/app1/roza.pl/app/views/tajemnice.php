{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
   
    {% if tablicaTajemnic %}
        <div id="tajemnice">
        {% for item in tablicaTajemnic %}
            <p>
            {% if nrTajemnicy == item.nr_tajemnicy %}
                <b>{{item.nazwa}}</br>
                {{item.opis}}</br>
                {{item.modyfikacja}}</br>                
                </b>
            {% else %}
                {{item.nazwa}}</br>
                {{item.opis}}</br>
                {{item.modyfikacja}}</br>
            {% endif %}
            </p>
        {% endfor%}
    {% endif %}
    {{siteContent}}
{% endblock %}