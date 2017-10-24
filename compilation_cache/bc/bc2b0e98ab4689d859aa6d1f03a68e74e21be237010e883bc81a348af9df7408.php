<?php

/* main.twig */
class __TwigTemplate_d585538494098bfc9ddc6f44244edc09a7882e9d65f940e619aef6636212f1b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\" class=\"no-js\">
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

\t<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
\t<link href=\"../vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t<link rel=\"stylesheet\" href=\"../css/reset.css\"> <!-- CSS reset -->
\t<link rel=\"stylesheet\" href=\"../css/style.css\"> <!-- Resource style -->
\t<script src=\"../js/modernizr.js\"></script> <!-- Modernizr -->
\t<title>FAQ</title>
</head>
<body>
<header>
\t<h1>Вопросы и ответы</h1>
</header>

<div class=\"navbar navbar-fixed-top\" role=\"navigation\">
    <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
    </div>
    <div class=\"navbar-collapse collapse text-left\">
        <div class=\"container col-xs-12\" style=\"padding-top: 10px;\">
            ";
        // line 31
        if ( !twig_test_empty($this->getAttribute((isset($context["mode"]) ? $context["mode"] : null), "userName", array(), "array"))) {
            // line 32
            echo "                <span>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mode"]) ? $context["mode"] : null), "userName", array(), "array"), "html", null, true);
            echo "</span>
            ";
        }
        // line 34
        echo "            <button type=\"button\" class=\"btn btn-sm btn-primary\" data-toggle=\"modal\"
                    ";
        // line 35
        if (twig_test_empty((isset($context["categories"]) ? $context["categories"] : null))) {
            // line 36
            echo "                        disabled
                    ";
        }
        // line 38
        echo "                    data-target=\"#formModalQuestion\">
                Задать вопрос
            </button>
            ";
        // line 41
        if (($this->getAttribute((isset($context["mode"]) ? $context["mode"] : null), "role", array(), "array") == "admin")) {
            // line 42
            echo "                <a href=\"../controllers/admins.php\" class=\"btn btn-success btn-sm\">Администрирование</a>
            ";
        } else {
            // line 44
            echo "                <button type=\"button\" class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#formModalAdmin\">
                    Войти
                </button>
            ";
        }
        // line 48
        echo "
        </div>
    </div>
</div>

<section class=\"cd-faq\">
\t<ul class=\"cd-faq-categories\">
\t\t";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 56
            echo "\t\t\t<li><a
\t\t\t";
            // line 57
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 58
                echo "\t\t\t\tclass=\"selected\"
\t\t\t";
            }
            // line 60
            echo "\t\t    href=\"#";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryName", array()), "html", null, true);
            echo "</a></li>
\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "\t</ul>
\t<div class=\"cd-faq-items\">
        ";
        // line 64
        if (( !twig_test_empty((isset($context["error"]) ? $context["error"] : null)) && (null === (isset($context["formAdminHide"]) ? $context["formAdminHide"] : null)))) {
            // line 65
            echo "\t\t\t<div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
        ";
        }
        // line 67
        echo "
        ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 69
            echo "\t\t\t<ul id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryId", array()), "html", null, true);
            echo "\" class=\"cd-faq-group\">
\t\t\t\t<li class=\"cd-faq-title\"><h2>";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryName", array()), "html", null, true);
            echo "</h2></li>

\t\t\t\t";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["questions"]) ? $context["questions"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                if (($this->getAttribute($context["question"], "getCategoryId", array()) == $this->getAttribute($context["category"], "getCategoryId", array()))) {
                    // line 73
                    echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a class=\"cd-faq-trigger\" href=\"#0\">";
                    // line 74
                    echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "getQuestionName", array()), "html", null, true);
                    echo "</a>

\t\t\t\t\t\t";
                    // line 76
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["answers"]) ? $context["answers"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                        if ((($this->getAttribute($context["question"], "getCategoryId", array()) == $this->getAttribute($context["category"], "getCategoryId", array())) && ($this->getAttribute($context["question"], "getQuestionId", array()) == $this->getAttribute($context["answer"], "getQuestionId", array())))) {
                            // line 77
                            echo "\t\t\t\t\t\t<div class=\"cd-faq-content\">
\t\t\t\t\t\t\t<p>";
                            // line 78
                            echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getAnswerName", array()), "html", null, true);
                            echo "</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 82
                    echo "\t\t\t\t\t</li>
                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "
\t\t\t</ul>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "
\t</div>
\t<a href=\"#0\" class=\"cd-close-panel\">Close</a>
</section>

<div class=\"modal fade\" id=\"formModalQuestion\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"formModalQuestionLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\"  style=\"padding: 0 10px 0 10px;\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
                <h4 class=\"modal-title\" id=\"formModalQuestionLabel\">Введите вопрос</h4>
            </div>
            <div class=\"modal-body\">
                <form class=\"form-horizontal\" method=\"POST\" role=\"form\">
                    <div class=\"form-group has-feedback\">
                        <label for=\"category\" class=\"form-control-label\">Тема:</label>
                        <select name=\"category\" class=\"form-control\">

                            ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 108
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryName", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "                        </select>
                    </div>

                    ";
        // line 113
        if ( !($this->getAttribute((isset($context["mode"]) ? $context["mode"] : null), "question", array(), "array") == "user")) {
            // line 114
            echo "                        <div class=\"form-group has-feedback\">
                            <label for=\"name\" class=\"form-control-label\">Имя (только буквы, не меньше 6 символов):</label>
                            <input type=\"text\" class=\"form-control\" required=\"required\" name=\"name\" pattern=\"[A-Za-zА-Яа-я]{6,}\">
                        </div>
                        <div class=\"form-group has-feedback\">
                            <label for=\"email\" class=\"form-control-label\">Email:</label>
                            <input type=\"email\" class=\"form-control\" required=\"required\" name=\"email\">
                        </div>
                    ";
        }
        // line 123
        echo "                    <div class=\"form-group has-feedback\">
                        <label for=\"question\" class=\"form-control-label\">Введите вопрос:</label>
                        <textarea rows=\"6\" class=\"form-control\" required=\"required\" name=\"question\"></textarea>
                    </div>
                    <div class=\"form-actions\">
                        <input type=\"submit\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Отмена\">
                        <input id=\"save\" type=\"submit\" class=\"btn btn-primary\" value=\"Сохранить\" name=\"save\">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class=\"modal fade\" id=\"formModalAdmin\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"formModalAdminLabel\" aria-hidden=\"true\">

    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\"  style=\"padding: 0 10px 0 10px;\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
                <h4 class=\"modal-title\" id=\"formModalAdminLabel\">Авторизуйтесь</h4>
            </div>

            ";
        // line 149
        if ( !twig_test_empty((isset($context["error"]) ? $context["error"] : null))) {
            // line 150
            echo "                <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
            ";
        }
        // line 152
        echo "

            <div class=\"modal-body\">
                <form class=\"form-horizontal\" method=\"POST\" role=\"form\">

                    <div class=\"form-group has-feedback\">
                        <label for=\"login\" class=\"form-control-label\">Логин:</label>
                        <input type=\"text\" class=\"form-control\" required=\"required\" name=\"login\" placeholder=\"Логин\"
                            ";
        // line 160
        if ( !(null === (isset($context["admin"]) ? $context["admin"] : null))) {
            // line 161
            echo "                                value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "login", array()), "html", null, true);
            echo "\"
                            ";
        }
        // line 163
        echo "                        >
                    </div>
                    <div class=\"form-group has-feedback\">
                        <label for=\"password\" class=\"form-control-label\">Пароль:</label>
                        <input type=\"password\" class=\"form-control\" required=\"required\" name=\"password\"  placeholder=\"Пароль\">
                    </div>

                    <div class=\"form-actions\">
                        <input type=\"submit\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Отмена\">
                        <input id=\"save\" type=\"submit\" class=\"btn btn-primary\" value=\"Войти\" name=\"admin\">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script src=\"../js/jquery-2.1.1.js\"></script>
<script src=\"../js/jquery.mobile.custom.min.js\"></script>
<script src=\"../js/main.js\"></script> <!-- Resource jQuery -->
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
<script src=\"../vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>

<script>
    \$(function() {
        \$('#save').click(function() {
            var formValid = true;
            \$('input, textarea').each(function() {
                var formGroup = \$(this).parents('.form-group');
                if (this.checkValidity()) {
                    formGroup.addClass('has-success').removeClass('has-error');
                } else {
                    formGroup.addClass('has-error').removeClass('has-success');
                    formValid = false;
                }
            });

            if (formValid) {
                \$('#formModalQuestion').modal('hide');
            }
        });
    });

    \$(function() {
        \$('#admin').click(function() {
            var formValid = true;
            \$('input').each(function() {
                var formGroup = \$(this).parents('.form-group');
                if (this.checkValidity()) {
                    formGroup.addClass('has-success').removeClass('has-error');
                } else {
                    formGroup.addClass('has-error').removeClass('has-success');
                    formValid = false;
                }
            });

            if (formValid) {
                \$('#formModalAdmin').modal('hide');
            }
        });
    });

    ";
        // line 226
        if (( !(null === (isset($context["formAdminHide"]) ? $context["formAdminHide"] : null)) &&  !(isset($context["formAdminHide"]) ? $context["formAdminHide"] : null))) {
            // line 227
            echo "        \$(\"#formModalAdmin\").modal('show');
    ";
        }
        // line 229
        echo "
</script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  396 => 229,  392 => 227,  390 => 226,  325 => 163,  319 => 161,  317 => 160,  307 => 152,  301 => 150,  299 => 149,  271 => 123,  260 => 114,  258 => 113,  253 => 110,  242 => 108,  238 => 107,  216 => 87,  208 => 84,  200 => 82,  189 => 78,  186 => 77,  181 => 76,  176 => 74,  173 => 73,  168 => 72,  163 => 70,  158 => 69,  154 => 68,  151 => 67,  145 => 65,  143 => 64,  139 => 62,  120 => 60,  116 => 58,  114 => 57,  111 => 56,  94 => 55,  85 => 48,  79 => 44,  75 => 42,  73 => 41,  68 => 38,  64 => 36,  62 => 35,  59 => 34,  53 => 32,  51 => 31,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main.twig", "C:\\OSPanel\\domains\\PHP\\diplom\\templates\\main.twig");
    }
}
