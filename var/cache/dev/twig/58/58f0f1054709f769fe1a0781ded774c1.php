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

/* don/sendMail.html.twig */
class __TwigTemplate_f3c8772c7626f5695dc06e87e121ac6a extends Template
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
        return "back.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "don/sendMail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "don/sendMail.html.twig"));

        $this->parent = $this->loadTemplate("back.html.twig", "don/sendMail.html.twig", 1);
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

        echo "send mail";
        
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
        echo "


    <div class=\"db-info-wrap\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"dashboard-box\">

                    <br/>

                    <h4>send email</h4>
                    <div class=\"form-group\">

                        <span id=\"instructions\" style=\"color: red\"></span>


                    </div>
                    ";
        // line 23
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), 'form_start');
        echo "
                    <div class=\"form-group\">

                        <label> users addresse </label>
                        <input required=\"\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["user_email"]) || array_key_exists("user_email", $context) ? $context["user_email"] : (function () { throw new RuntimeError('Variable "user_email" does not exist.', 27, $this->source); })()), "html", null, true);
        echo "\" class=\"form-control\"
                               name=\"email\" readonly>

                    </div>


                    <div class=\"form-group\">
                        ";
        // line 34
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "subject", [], "any", false, false, false, 34), 'row');
        echo "

                    </div>
                    <div class=\"form-group\">

                        ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "message", [], "any", false, false, false, 39), 'row', ["id" => "textarea"]);
        echo "

                    </div>


                    <div class=\"form-group\">
                        <button type=\"submit\" class=\"button-primary\" name=\"sendMailToUser\">send email
                        </button>
                    </div>
                    ";
        // line 48
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), 'form_end');
        echo "
                    <button id=\"start\" class=\"btn btn-primary btn-block\">
                        Start Recording
                    </button>

                    <button id=\"clear\" class=\"btn btn-danger btn-block\">Clear Text</button>



                </div>
            </div>
        </div>
    </div>
















    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>

    <script>
        var SpeechRecognition = window.webkitSpeechRecognition;

        var recognition = new SpeechRecognition();
        let saveHandle;

        var Textbox = \$(\"#textarea\");
        var instructions = \$(\"#instructions\");

        var Content = \"\";

        recognition.continuous = true;

        recognition.onresult = function (event) {
            var current = event.resultIndex;

            var transcript = event.results[current][0].transcript;

            Content += transcript;
            Textbox.val(Content);
        };

        \$(\"#start\").on(\"click\", function (e) {
            if (\$(this).text() == \"Stop Recording\") {
                \$(this).html(\"Start Recording\");
                \$(\"#instructions\").html(\"\");
                recognition.stop();
            } else {
                \$(this).html(\"Stop Recording\");
                \$(\"#instructions\").html(\"voice in !! \");
                if (Content.length) {
                    Content += \" \";
                }
                recognition.start();
            }
        });


        \$(\"#load\").click(function () {
            if (\$(this).html() == \"Modify Changes\") {
                saveFile(saveHandle, Content);
            } else {
                \$(this).html(\"Modify Changes\");
                loadFile();
            }
        });

        async function getNewFileHandle() {
            const handle = await window.chooseFileSystemEntries();
            return handle;
        }


        async function verifyPermission(fileHandle, withWrite) {
            const opts = {};
            if (withWrite) {
                opts.writable = true;
            }
            // Check if we already have permission, if so, return true.
            if ((await fileHandle.queryPermission(opts)) === \"granted\") {
                return true;
            }
            // Request permission to the file, if the user grants permission, return true.
            if ((await fileHandle.requestPermission(opts)) === \"granted\") {
                return true;
            }
            // The user did nt grant permission, return false.
            return false;
        }

        \$(\"#clear\").click(function () {
            Textbox.val(\"\");
            \$(\"#load\").html(\"Load File\");
            Content = \"\";
            \$(\"#start\").html(\"Start Recording\");
        });

        Textbox.on(\"input\", function () {
            Content = \$(this).val();
        });
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "don/sendMail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 48,  132 => 39,  124 => 34,  114 => 27,  107 => 23,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'back.html.twig' %}

{% block title %}send mail{% endblock %}

{% block body %}



    <div class=\"db-info-wrap\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"dashboard-box\">

                    <br/>

                    <h4>send email</h4>
                    <div class=\"form-group\">

                        <span id=\"instructions\" style=\"color: red\"></span>


                    </div>
                    {{ form_start(form) }}
                    <div class=\"form-group\">

                        <label> users addresse </label>
                        <input required=\"\" value=\"{{ user_email }}\" class=\"form-control\"
                               name=\"email\" readonly>

                    </div>


                    <div class=\"form-group\">
                        {{ form_row(form.subject) }}

                    </div>
                    <div class=\"form-group\">

                        {{ form_row(form.message , { 'id': 'textarea' }) }}

                    </div>


                    <div class=\"form-group\">
                        <button type=\"submit\" class=\"button-primary\" name=\"sendMailToUser\">send email
                        </button>
                    </div>
                    {{ form_end(form) }}
                    <button id=\"start\" class=\"btn btn-primary btn-block\">
                        Start Recording
                    </button>

                    <button id=\"clear\" class=\"btn btn-danger btn-block\">Clear Text</button>



                </div>
            </div>
        </div>
    </div>
















    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>

    <script>
        var SpeechRecognition = window.webkitSpeechRecognition;

        var recognition = new SpeechRecognition();
        let saveHandle;

        var Textbox = \$(\"#textarea\");
        var instructions = \$(\"#instructions\");

        var Content = \"\";

        recognition.continuous = true;

        recognition.onresult = function (event) {
            var current = event.resultIndex;

            var transcript = event.results[current][0].transcript;

            Content += transcript;
            Textbox.val(Content);
        };

        \$(\"#start\").on(\"click\", function (e) {
            if (\$(this).text() == \"Stop Recording\") {
                \$(this).html(\"Start Recording\");
                \$(\"#instructions\").html(\"\");
                recognition.stop();
            } else {
                \$(this).html(\"Stop Recording\");
                \$(\"#instructions\").html(\"voice in !! \");
                if (Content.length) {
                    Content += \" \";
                }
                recognition.start();
            }
        });


        \$(\"#load\").click(function () {
            if (\$(this).html() == \"Modify Changes\") {
                saveFile(saveHandle, Content);
            } else {
                \$(this).html(\"Modify Changes\");
                loadFile();
            }
        });

        async function getNewFileHandle() {
            const handle = await window.chooseFileSystemEntries();
            return handle;
        }


        async function verifyPermission(fileHandle, withWrite) {
            const opts = {};
            if (withWrite) {
                opts.writable = true;
            }
            // Check if we already have permission, if so, return true.
            if ((await fileHandle.queryPermission(opts)) === \"granted\") {
                return true;
            }
            // Request permission to the file, if the user grants permission, return true.
            if ((await fileHandle.requestPermission(opts)) === \"granted\") {
                return true;
            }
            // The user did nt grant permission, return false.
            return false;
        }

        \$(\"#clear\").click(function () {
            Textbox.val(\"\");
            \$(\"#load\").html(\"Load File\");
            Content = \"\";
            \$(\"#start\").html(\"Start Recording\");
        });

        Textbox.on(\"input\", function () {
            Content = \$(this).val();
        });
    </script>
{% endblock %}", "don/sendMail.html.twig", "C:\\Users\\barranihamza\\Desktop\\don\\templates\\don\\sendMail.html.twig");
    }
}
