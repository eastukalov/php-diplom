<?php

/* question_edit_admin.twig */
class __TwigTemplate_9126387200a76159f72bccd5b3d9d3f943dd8af9b6161bcc7adaa97182ea97e9 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- Выше 3 Мета-теги ** должны прийти в первую очередь в голове; любой другой руководитель контент *после* эти теги -->
    <title>Администрирование</title>

    <!-- Bootstrap -->
    <link href=\"../vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">



    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- Предупреждение: Respond.js не работает при просмотре страницы через файл:// -->
    <!--[if lt IE 9]>
<!--    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script >-->
    <!--<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>-->
    <![endif]-->

</head>
<body>
<div class=\"container\">
    <form role=\"form\" class=\"form-horizontal\" method=\"POST\">
        <legend>Редактирование вопроса</legend>
        ";
        // line 27
        if ( !twig_test_empty((isset($context["error"]) ? $context["error"] : null))) {
            // line 28
            echo "            <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
        ";
        }
        // line 30
        echo "        <div class=\"form-group\">
            <label for=\"category\" class=\"control-label col-sm-2\">Категория</label>
            <div class=\"col-sm-10\">
                <select name=\"category\" class=\"form-control\">

                    ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 36
            echo "                        <option
                                ";
            // line 37
            if (($this->getAttribute($context["category"], "getCategoryId", array()) == $this->getAttribute((isset($context["answer"]) ? $context["answer"] : null), "getCategoryId", array()))) {
                // line 38
                echo "                                    selected
                                ";
            }
            // line 40
            echo "                                value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryName", array()), "html", null, true);
            echo "
                        </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                </select>
            </div>
        </div>
        <div class=\"form-group has-feedback first\">
            <label for=\"name\" class=\"control-label col-sm-2\">Имя пользователя</label>
            <div class=\"col-sm-10\">
                <input name=\"name\" type=\"text\" class=\"form-control\" required=\"required\" placeholder=\"Имя пользователя\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["answer"]) ? $context["answer"] : null), "getUser", array()), "getName", array()), "html", null, true);
        echo "\"/>
            </div>
        </div>
        <div class=\"form-group has-feedback first\">
            <label for=\"email\" class=\"control-label col-sm-2\" >E-mail</label>
            <div class=\"col-sm-10\">
                <input name=\"email\" type=\"email\" class=\"form-control\" required=\"required\" placeholder=\"E-mail\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["answer"]) ? $context["answer"] : null), "getUser", array()), "getEmail", array()), "html", null, true);
        echo "\"/>
            </div>
        </div>
        <div class=\"form-group has-feedback first\">
            <label for=\"question\" class=\"control-label col-sm-2\" >Вопрос</label>
            <div class=\"col-sm-10\">
                <textarea rows=6 name=\"question\" class=\"form-control\" required=\"required\" placeholder=\"Вопрос\">";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["answer"]) ? $context["answer"] : null), "getQuestionName", array()), "html", null, true);
        echo "</textarea>
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"status\" class=\"control-label col-sm-2\">Статус</label>
            <div class=\"col-sm-10\">
                <select name=\"status\" class=\"form-control\">

                    ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statuses"]) ? $context["statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            // line 70
            echo "                        <option
                                ";
            // line 71
            if (($this->getAttribute($this->getAttribute((isset($context["answer"]) ? $context["answer"] : null), "getStatus", array()), "getId", array()) == $this->getAttribute($context["status"], "getId", array()))) {
                // line 72
                echo "                                    selected
                                ";
            }
            // line 74
            echo "                                value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "getId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "getName", array()), "html", null, true);
            echo "
                        </option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                </select>
            </div>
        </div>
        <div class=\"form-actions\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <input type=\"submit\" class=\"btn btn-primary\" value=\"Сохранить\" name=\"editQuestion\"/>
                <input type=\"submit\" class=\"btn\" value=\"Отменить\" name=\"cancel\"/>
            </div>
        </div>
    </form>

</div>

<div class=\"table-responsive container\" style=\"padding-bottom: 40px;\">
    <legend>Добавление ответа на вопрос</legend>

    <form role=\"form\" class=\"form-horizontal\" method=\"POST\">
        <div class=\"form-group has-feedback second\">
            <label for=\"answer\" class=\"control-label col-sm-2\" >Ответ</label>
            <div class=\"col-sm-10\">
                ";
        // line 97
        if ( !twig_test_empty((isset($context["edit_answer"]) ? $context["edit_answer"] : null))) {
            // line 98
            echo "                    <textarea rows=6 name=\"answer\" class=\"form-control\" required=\"required\" placeholder=\"Ответ\">";
            echo twig_escape_filter($this->env, (isset($context["edit_answer"]) ? $context["edit_answer"] : null), "html", null, true);
            echo "</textarea>
                ";
        } else {
            // line 100
            echo "                    <textarea rows=6 name=\"answer\" class=\"form-control\" required=\"required\" placeholder=\"Ответ\"></textarea>
                ";
        }
        // line 102
        echo "            </div>
        </div>

        <div class=\"form-actions\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <input type=\"hidden\" name=\"add_edit\" value=\"";
        // line 107
        echo twig_escape_filter($this->env, (isset($context["add_edit"]) ? $context["add_edit"] : null), "html", null, true);
        echo "\">
                <input type=\"submit\" class=\"btn btn-primary\" value=
                    ";
        // line 109
        if (((isset($context["add_edit"]) ? $context["add_edit"] : null) == "edit")) {
            // line 110
            echo "                       \"Сохранить\"
                    ";
        } else {
            // line 112
            echo "                       \"Добавить\"
                    ";
        }
        // line 114
        echo "                name=\"addedit\"/>
            </div>
        </div>
    </form>

    <table class=\"table table-bordered\"  style=\"margin-top: 60px;\">
        <thead>
            <tr>
                <th>Ответы</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["answers"]) ? $context["answers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["ans"]) {
            if ( !(null === $this->getAttribute($context["ans"], "getAnswerName", array()))) {
                // line 128
                echo "            <tr>
                <td>";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute($context["ans"], "getAnswerName", array()), "html", null, true);
                echo "</td>
                <td class=\"col-sm-2\">
                    <div class=\"input-group\">
                        <div class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-default\">Действие</button>
                            <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                <span class=\"caret\"></span>
                                <span class=\"sr-only\">Toggle Dropdown</span>
                            </button>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"../controllers/questions_edit.php?id=";
                // line 139
                echo twig_escape_filter($this->env, $this->getAttribute($context["ans"], "getQuestionId", array()), "html", null, true);
                echo "&answerId=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ans"], "getAnswerId", array()), "html", null, true);
                echo "&action=edit\">Изменить</a></li>
                                <li><a href=\"../controllers/questions_edit.php?id=";
                // line 140
                echo twig_escape_filter($this->env, $this->getAttribute($context["ans"], "getQuestionId", array()), "html", null, true);
                echo "&answerId=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ans"], "getAnswerId", array()), "html", null, true);
                echo "&action=delete\">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ans'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        echo "        </tbody>
    </table>
</div>

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
<script src=\"../vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
<script>
    \$(function() {
        \$('addedit').click(function() {
            var formValid = true;
            \$('textarea').each(function() {
                var formGroup = \$(this).parents('.form-group.first');
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
        \$('editQuestion').click(function() {
            var formValid = true;
            \$('input, textarea').each(function() {
                var formGroup = \$(this).parents('.form-group.first');
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
</script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "question_edit_admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 147,  247 => 140,  241 => 139,  228 => 129,  225 => 128,  220 => 127,  205 => 114,  201 => 112,  197 => 110,  195 => 109,  190 => 107,  183 => 102,  179 => 100,  173 => 98,  171 => 97,  149 => 77,  137 => 74,  133 => 72,  131 => 71,  128 => 70,  124 => 69,  113 => 61,  104 => 55,  95 => 49,  87 => 43,  75 => 40,  71 => 38,  69 => 37,  66 => 36,  62 => 35,  55 => 30,  49 => 28,  47 => 27,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "question_edit_admin.twig", "C:\\OSPanel\\domains\\php\\diplom\\templates\\question_edit_admin.twig");
    }
}
