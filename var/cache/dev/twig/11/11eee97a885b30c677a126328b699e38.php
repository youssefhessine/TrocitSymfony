<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* front.html.twig */
class __TwigTemplate_02b4c70833e374d8acea5a877e57c174 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"author\" content=\"\" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("front/assets/favicon.ico"), "html", null, true);
        echo "\" />
    <!-- Bootstrap icons-->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\" rel=\"stylesheet\" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("front/css/styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
</head>
<body>
<!-- Navigation-->
<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container px-4 px-lg-5\">

    </div>
</nav>
<!-- Header-->
<header class=\"bg-dark py-5\">
    <div class=\"container px-4 px-lg-5 my-5\">
        <div class=\"text-center text-white\">
            <h1 class=\"display-4 fw-bolder\">Shop in style</h1>
            <p class=\"lead fw-normal text-white-50 mb-0\">With this shop hompeage template</p>
        </div>
    </div>
</header>
";
        // line 32
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "<!-- Footer-->
<footer class=\"py-5 bg-dark\">
    <div class=\"container\"><p class=\"m-0 text-center text-white\">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
<!-- Core theme JS-->
<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("front/js/scripts.js"), "html", null, true);
        echo "\"></script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 32
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 32,  94 => 41,  85 => 34,  83 => 32,  62 => 14,  55 => 10,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"author\" content=\"\" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset(\"front/assets/favicon.ico\") }}\" />
    <!-- Bootstrap icons-->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\" rel=\"stylesheet\" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href=\"{{ asset(\"front/css/styles.css\") }}\" rel=\"stylesheet\" />
</head>
<body>
<!-- Navigation-->
<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container px-4 px-lg-5\">

    </div>
</nav>
<!-- Header-->
<header class=\"bg-dark py-5\">
    <div class=\"container px-4 px-lg-5 my-5\">
        <div class=\"text-center text-white\">
            <h1 class=\"display-4 fw-bolder\">Shop in style</h1>
            <p class=\"lead fw-normal text-white-50 mb-0\">With this shop hompeage template</p>
        </div>
    </div>
</header>
{% block body %}
{% endblock %}
<!-- Footer-->
<footer class=\"py-5 bg-dark\">
    <div class=\"container\"><p class=\"m-0 text-center text-white\">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\"></script>
<!-- Core theme JS-->
<script src=\"{{ asset(\"front/js/scripts.js\") }}\"></script>
</body>
</html>
", "front.html.twig", "C:\\Users\\Hedi\\Desktop\\2nd_wave\\don\\templates\\front.html.twig");
    }
}
