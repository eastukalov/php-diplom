<?php

/* main.twig */
class __TwigTemplate_cc711e3bad88bd983aee694b43fe9c6b994c7fff966dec7f8f6a19b3b99d87d9 extends Twig_Template
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
        echo "            <button type=\"button\" class=\"btn btn-sm btn-primary\" data-toggle=\"modal\" data-target=\"#formModalQuestion\">
                Задать вопрос
            </button>
            ";
        // line 37
        if (($this->getAttribute((isset($context["mode"]) ? $context["mode"] : null), "role", array(), "array") == "admin")) {
            // line 38
            echo "                <a href=\"../controllers/admins.php\" class=\"btn btn-success btn-sm\">Администрирование</a>
            ";
        } else {
            // line 40
            echo "                <button type=\"button\" class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#formModalAdmin\">
                    Войти
                </button>
            ";
        }
        // line 44
        echo "
        </div>
    </div>
</div>

<section class=\"cd-faq\">
\t<ul class=\"cd-faq-categories\">
\t\t";
        // line 51
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
            // line 52
            echo "\t\t\t<li><a
\t\t\t";
            // line 53
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 54
                echo "\t\t\t\tclass=\"selected\"
\t\t\t";
            }
            // line 56
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
        // line 58
        echo "\t</ul>
\t<div class=\"cd-faq-items\">
        ";
        // line 60
        if (( !twig_test_empty((isset($context["error"]) ? $context["error"] : null)) && (null === (isset($context["formAdminHide"]) ? $context["formAdminHide"] : null)))) {
            // line 61
            echo "\t\t\t<div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
        ";
        }
        // line 63
        echo "
        ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 65
            echo "\t\t\t<ul id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryId", array()), "html", null, true);
            echo "\" class=\"cd-faq-group\">
\t\t\t\t<li class=\"cd-faq-title\"><h2>";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryName", array()), "html", null, true);
            echo "</h2></li>

\t\t\t\t";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["questions"]) ? $context["questions"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                if (($this->getAttribute($context["question"], "getCategoryId", array()) == $this->getAttribute($context["category"], "getCategoryId", array()))) {
                    // line 69
                    echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a class=\"cd-faq-trigger\" href=\"#0\">";
                    // line 70
                    echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "getQuestionName", array()), "html", null, true);
                    echo "</a>

\t\t\t\t\t\t";
                    // line 72
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["answers"]) ? $context["answers"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                        if ((($this->getAttribute($context["question"], "getCategoryId", array()) == $this->getAttribute($context["category"], "getCategoryId", array())) && ($this->getAttribute($context["question"], "getQuestionId", array()) == $this->getAttribute($context["answer"], "getQuestionId", array())))) {
                            // line 73
                            echo "\t\t\t\t\t\t<div class=\"cd-faq-content\">
\t\t\t\t\t\t\t<p>";
                            // line 74
                            echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getAnswerName", array()), "html", null, true);
                            echo "</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 78
                    echo "\t\t\t\t\t</li>
                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "
\t\t\t</ul>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
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
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 104
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
        // line 106
        echo "                        </select>
                    </div>

                    ";
        // line 109
        if ( !($this->getAttribute((isset($context["mode"]) ? $context["mode"] : null), "question", array(), "array") == "user")) {
            // line 110
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
        // line 119
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
        // line 145
        if ( !twig_test_empty((isset($context["error"]) ? $context["error"] : null))) {
            // line 146
            echo "                <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
            ";
        }
        // line 148
        echo "

            <div class=\"modal-body\">
                <form class=\"form-horizontal\" method=\"POST\" role=\"form\">

                    <div class=\"form-group has-feedback\">
                        <label for=\"login\" class=\"form-control-label\">Логин:</label>
                        <input type=\"text\" class=\"form-control\" required=\"required\" name=\"login\" placeholder=\"Логин\"
                            ";
        // line 156
        if ( !(null === (isset($context["admin"]) ? $context["admin"] : null))) {
            // line 157
            echo "                                value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "login", array()), "html", null, true);
            echo "\"
                            ";
        }
        // line 159
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
        // line 222
        if (( !(null === (isset($context["formAdminHide"]) ? $context["formAdminHide"] : null)) &&  !(isset($context["formAdminHide"]) ? $context["formAdminHide"] : null))) {
            // line 223
            echo "        \$(\"#formModalAdmin\").modal('show');
    ";
        }
        // line 225
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
        return array (  387 => 225,  383 => 223,  381 => 222,  316 => 159,  310 => 157,  308 => 156,  298 => 148,  292 => 146,  290 => 145,  262 => 119,  251 => 110,  249 => 109,  244 => 106,  233 => 104,  229 => 103,  207 => 83,  199 => 80,  191 => 78,  180 => 74,  177 => 73,  172 => 72,  167 => 70,  164 => 69,  159 => 68,  154 => 66,  149 => 65,  145 => 64,  142 => 63,  136 => 61,  134 => 60,  130 => 58,  111 => 56,  107 => 54,  105 => 53,  102 => 52,  85 => 51,  76 => 44,  70 => 40,  66 => 38,  64 => 37,  59 => 34,  53 => 32,  51 => 31,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main.twig", "C:\\OSPanel\\domains\\php\\diplom\\templates\\main.twig");
    }
}
