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

/* don/show.html.twig */
class __TwigTemplate_74d496c53f312a2787c9e0bc8927080f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "front.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "don/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "don/show.html.twig"));

        $this->parent = $this->loadTemplate("front.html.twig", "don/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Don";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Don</h1>
    <section class=\"py-5\">
        <div class=\"container px-4 px-lg-5 my-5\">
            <div class=\"row gx-4 gx-lg-5 align-items-center\">
                <div class=\"col-md-6\"><img class=\"card-img-top mb-5 mb-md-0\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["don"]) || array_key_exists("don", $context) ? $context["don"] : (function () { throw new RuntimeError('Variable "don" does not exist.', 10, $this->source); })()), "image", [], "any", false, false, false, 10), "html", null, true);
        echo "\" alt=\"...\" /></div>
                <div class=\"col-md-6\">
                    <div class=\"small mb-1\">Jeton: ";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["don"]) || array_key_exists("don", $context) ? $context["don"] : (function () { throw new RuntimeError('Variable "don" does not exist.', 12, $this->source); })()), "jeton", [], "any", false, false, false, 12), "html", null, true);
        echo "</div>
                    <h1 class=\"display-5 fw-bolder\">";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["don"]) || array_key_exists("don", $context) ? $context["don"] : (function () { throw new RuntimeError('Variable "don" does not exist.', 13, $this->source); })()), "produit", [], "any", false, false, false, 13), "html", null, true);
        echo "</h1>
                    <div class=\"fs-5 mb-5\">
                        <span>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["don"]) || array_key_exists("don", $context) ? $context["don"] : (function () { throw new RuntimeError('Variable "don" does not exist.', 15, $this->source); })()), "nom", [], "any", false, false, false, 15), "html", null, true);
        echo "</span>
                    </div>
                    <p class=\"lead\">";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["don"]) || array_key_exists("don", $context) ? $context["don"] : (function () { throw new RuntimeError('Variable "don" does not exist.', 17, $this->source); })()), "description", [], "any", false, false, false, 17), "html", null, true);
        echo "
                    <div class=\"d-flex\">
                        <a class=\"btn btn-outline-dark flex-shrink-0\" href=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("don_index");
        echo "\">
                            Back to list</a>
                        <a class=\"btn btn-outline-dark flex-shrink-0\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("don_edit", ["idDon" => twig_get_attribute($this->env, $this->source, (isset($context["don"]) || array_key_exists("don", $context) ? $context["don"] : (function () { throw new RuntimeError('Variable "don" does not exist.', 21, $this->source); })()), "idDon", [], "any", false, false, false, 21)]), "html", null, true);
        echo "\">
                            Edit</a>

                        ";
        // line 24
        echo twig_include($this->env, $context, "don/delete.html.twig");
        echo "
                    </div>
                </div>
            </div>
        </div>
    </section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "don/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 24,  123 => 21,  118 => 19,  113 => 17,  108 => 15,  103 => 13,  99 => 12,  94 => 10,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'front.html.twig' %}

{% block title %}Don{% endblock %}

{% block body %}
    <h1>Don</h1>
    <section class=\"py-5\">
        <div class=\"container px-4 px-lg-5 my-5\">
            <div class=\"row gx-4 gx-lg-5 align-items-center\">
                <div class=\"col-md-6\"><img class=\"card-img-top mb-5 mb-md-0\" src=\"{{ don.image }}\" alt=\"...\" /></div>
                <div class=\"col-md-6\">
                    <div class=\"small mb-1\">Jeton: {{ don.jeton }}</div>
                    <h1 class=\"display-5 fw-bolder\">{{ don.produit }}</h1>
                    <div class=\"fs-5 mb-5\">
                        <span>{{ don.nom }}</span>
                    </div>
                    <p class=\"lead\">{{ don.description }}
                    <div class=\"d-flex\">
                        <a class=\"btn btn-outline-dark flex-shrink-0\" href=\"{{ path('don_index') }}\">
                            Back to list</a>
                        <a class=\"btn btn-outline-dark flex-shrink-0\" href=\"{{ path('don_edit', {'idDon': don.idDon}) }}\">
                            Edit</a>

                        {{ include('don/delete.html.twig') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
{% endblock %}
", "don/show.html.twig", "C:\\Users\\barranihamza\\Desktop\\don\\templates\\don\\show.html.twig");
    }
}
