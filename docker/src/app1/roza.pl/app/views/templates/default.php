<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>{% block title %} {% endblock %}</title>
</head>
<body>
    {% include 'templates/partials/header.php' %}
    {% include 'templates/partials/nav.php' %}
    {% block content1 %}{% endblock %}<hr>
    {% block content2 %}{% endblock %}  
    {% include 'templates/partials/footer.php' %}
</body>
</html>