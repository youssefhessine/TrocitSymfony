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

/* don/index.html.twig */
class __TwigTemplate_8e483f9da12cb3f5acab6a9ff8d5449a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "don/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "don/index.html.twig"));

        $this->parent = $this->loadTemplate("front.html.twig", "don/index.html.twig", 1);
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

        echo "Don index";
        
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
        echo "    <h1>Don index</h1>
    <a  class=\"btn btn-outline-dark mt-auto\" href=\"";
        // line 7
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("don_new");
        echo "\">Ajouter nouveau</a>
           
    <!-- Section-->
    <section class=\"py-5\">
        <div class=\"container px-4 px-lg-5 mt-5\">
            <div class=\"row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center\">
                ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dons"]) || array_key_exists("dons", $context) ? $context["dons"] : (function () { throw new RuntimeError('Variable "dons" does not exist.', 13, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["don"]) {
            // line 14
            echo "                <div class=\"col mb-5\">
                    <div class=\"card h-100\">
                    
                        <!-- Product image-->
                        <img class=\"card-img-top\" src=\"../uploads/";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["don"], "image", [], "any", false, false, false, 18), "html", null, true);
            echo "\"   height=\"100\" width=\"100\">
                        <!-- Product details-->
                        <div class=\"card-body p-4\">
                            <div class=\"text-center\">
                                <!-- Product name-->
                                <h5 class=\"fw-bolder\">";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["don"], "produit", [], "any", false, false, false, 23), "html", null, true);
            echo "</h5>
                                <!-- Product price-->
                                ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["don"], "nom", [], "any", false, false, false, 25), "html", null, true);
            echo " - ";
            ((twig_get_attribute($this->env, $this->source, $context["don"], "date", [], "any", false, false, false, 25)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["don"], "date", [], "any", false, false, false, 25), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                            <div class=\"text-center\">
                                <a class=\"btn btn-outline-dark mt-auto\" href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("don_show", ["idDon" => twig_get_attribute($this->env, $this->source, $context["don"], "idDon", [], "any", false, false, false, 31)]), "html", null, true);
            echo "\">
                                    Show</a>
                                <a class=\"btn btn-outline-dark mt-auto\" href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("don_edit", ["idDon" => twig_get_attribute($this->env, $this->source, $context["don"], "idDon", [], "any", false, false, false, 33)]), "html", null, true);
            echo "\">
                                    Edit</a>
                                    <a class=\"btn btn-outline-dark mt-auto\" href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sendMailToUser", ["email_use" => twig_get_attribute($this->env, $this->source, $context["don"], "nom", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\">
                                    send mail</a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['don'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "            </div>
        </div>
    </section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "don/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 42,  144 => 35,  139 => 33,  134 => 31,  123 => 25,  118 => 23,  110 => 18,  104 => 14,  100 => 13,  91 => 7,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'front.html.twig' %}

{% block title %}Don index{% endblock %}

{% block body %}
    <h1>Don index</h1>
    <a  class=\"btn btn-outline-dark mt-auto\" href=\"{{path('don_new')}}\">Ajouter nouveau</a>
           
    <!-- Section-->
    <section class=\"py-5\">
        <div class=\"container px-4 px-lg-5 mt-5\">
            <div class=\"row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center\">
                {% for don in dons %}
                <div class=\"col mb-5\">
                    <div class=\"card h-100\">
                    
                        <!-- Product image-->
                        <img class=\"card-img-top\" src=\"../uploads/{{ don.image }}\"   height=\"100\" width=\"100\">
                        <!-- Product details-->
                        <div class=\"card-body p-4\">
                            <div class=\"text-center\">
                                <!-- Product name-->
                                <h5 class=\"fw-bolder\">{{ don.produit }}</h5>
                                <!-- Product price-->
                                {{ don.nom }} - {{ don.date ? don.date|date('Y-m-d') : '' }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                            <div class=\"text-center\">
                                <a class=\"btn btn-outline-dark mt-auto\" href=\"{{ path('don_show', {'idDon': don.idDon}) }}\">
                                    Show</a>
                                <a class=\"btn btn-outline-dark mt-auto\" href=\"{{ path('don_edit', {'idDon': don.idDon}) }}\">
                                    Edit</a>
                                    <a class=\"btn btn-outline-dark mt-auto\" href=\"{{ path('sendMailToUser', {'email_use': don.nom}) }}\">
                                    send mail</a>
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </section>
{% endblock %}
", "don/index.html.twig", "C:\\Users\\barranihamza\\Desktop\\TrocitSymfony\\templates\\don\\index.html.twig");
    }
}
