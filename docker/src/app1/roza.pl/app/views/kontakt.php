{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
    {% if auth %}
        <p>kontakt info dla zalogowanych</p>
    {% else %}
        <p>kontakt info dla anonimowych</p>
    {% endif %}
    
{% endblock %}

{% block content2 %}

{% endblock %}