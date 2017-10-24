<?php

/* question_admin.twig */
class __TwigTemplate_af0af7060558adc61fa89580affa0f7d2b41ba10da4026dbb71d830aa8054be6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main_admin.twig", "question_admin.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main_admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"container\" style=\"margin-top: 60px\">

    <ul class=\"nav navbar-nav\">
        <li role=\"presentation\" class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Темы <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
                <li><a href=\"../controllers/questions.php?id=-1&action=filter\">Все</a> </li>
                ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 14
            echo "                    <li><a href=\"../controllers/questions.php?id=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryId", array()), "html", null, true);
            echo "&action=filter\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "getCategoryName", array()), "html", null, true);
            echo "</a> </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "            </ul>
        </li>
    </ul>

    <ul class=\"nav navbar-nav navbar-right\">
        <li role=\"presentation\" class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Сортировка <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
                <li><a href=\"../controllers/questions.php?id=1&action=sort\">Свежие неотвеченные вопросы наверху</a></li>
                <li><a href=\"../controllers/questions.php?id=2&action=sort\">По категории, по дате добавления</a></li>
            </ul>
        </li>
    </ul>

</div>

<div class=\"container col-xs-12\">
    ";
        // line 35
        if ( !twig_test_empty((isset($context["error"]) ? $context["error"] : null))) {
            // line 36
            echo "        <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
    ";
        }
        // line 38
        echo "    <table id=\"main_table\" class=\"table table-hover table-striped table-bordered table-condensed\">
        <thead>
        <tr><th>Категория</th><th>Дата</th><th>Вопрос (нажмите, чтобы просмотреть список ответов)</th><th>Статус</th><th>Кто задал</th><th></th></tr>
        </thead>

        <tbody>
        ";
        // line 44
        $context["id"] = 0;
        // line 45
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["answers"]) ? $context["answers"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 46
            echo "
            ";
            // line 47
            if (((isset($context["id"]) ? $context["id"] : null) != $this->getAttribute($context["answer"], "getQuestionId", array()))) {
                // line 48
                echo "                <tr>
                    <td>";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getCategoryName", array()), "html", null, true);
                echo " </td>
                    <td>";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getDate", array()), "html", null, true);
                echo "</td>
                    <td>
                        <div class=\"panel-group\" role=\"tablist\" id=\"accordion\" aria-multiselectable=\"true\">
                            <div class=\"panel panel-default\">
                                <div class=\"panel-heading\" role=\"tab\" id=\"headingOne\">
                                    <h4 class=\"panel-title\">
                                        <a href=\"#collapse";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                                           aria-expanded=\"false\" aria-controls=\"collapseOne\" class=\"collapsed\">";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getQuestionName", array()), "html", null, true);
                echo "</a>
                                    </h4>
                                </div>

                                ";
                // line 61
                if ( !(null === $this->getAttribute($context["answer"], "getAnswerName", array()))) {
                    // line 62
                    echo "
                                   <div class=\"panel-collapse collapse\" role=\"tabpanel\" id=\"collapse";
                    // line 63
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                    echo "\" aria-labelledby=\"headingOne\" aria-expanded=\"false\" style=\"height: 0px;\">
                                        <div class=\"panel-body\">
                                            <ul>
                                                ";
                    // line 66
                    $context["start"] = $this->getAttribute($context["loop"], "index0", array());
                    // line 67
                    echo "                                                ";
                    $context["end"] = ($this->getAttribute($context["loop"], "length", array()) - 1);
                    // line 68
                    echo "                                                ";
                    $context["id"] = $this->getAttribute($context["answer"], "getQuestionId", array());
                    // line 69
                    echo "                                                ";
                    $context["quit"] = true;
                    // line 70
                    echo "                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range((isset($context["start"]) ? $context["start"] : null), (isset($context["end"]) ? $context["end"] : null)));
                    foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                        if ((isset($context["quit"]) ? $context["quit"] : null)) {
                            // line 71
                            echo "
                                                    ";
                            // line 72
                            if (((isset($context["id"]) ? $context["id"] : null) != $this->getAttribute($this->getAttribute((isset($context["answers"]) ? $context["answers"] : null), $context["k"], array(), "array"), "getQuestionId", array()))) {
                                // line 73
                                echo "                                                       ";
                                $context["quit"] = false;
                                // line 74
                                echo "                                                    ";
                            } else {
                                // line 75
                                echo "                                                        <li>";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["answers"]) ? $context["answers"] : null), $context["k"], array(), "array"), "getAnswerName", array()), "html", null, true);
                                echo "</li>
                                                    ";
                            }
                            // line 77
                            echo "
                                                ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 79
                    echo "                                            </ul>
                                        </div>
                                   </div>

                                ";
                }
                // line 84
                echo "
                            </div>
                        </div>

                    </td>
                    <td>";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "getStatus", array()), "getName", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "getUser", array()), "getName", array()), "html", null, true);
                echo "</td>
                    <td>
                        <div class=\"input-group\">
                            <div class=\"input-group-btn\">
                                <button type=\"button\" class=\"btn btn-default\">Действие</button>
                                <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <span class=\"caret\"></span>
                                    <span class=\"sr-only\">Toggle Dropdown</span>
                                </button>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"../controllers/questions_edit.php?id=";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getQuestionId", array()), "html", null, true);
                echo "\">Изменить</a></li>
                                    <li><a href=\"../controllers/questions.php?id=";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "getQuestionId", array()), "html", null, true);
                echo "&action=delete\">Удалить</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            ";
            }
            // line 108
            echo "
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "        </tbody>
    </table>
</div>
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
<script src=\"../vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
<script src=\"../js/datatables.min.js\"></script>
<script type=\"text/javascript\">
    \$(document).ready(function() {
        var table = \$('#main_table').DataTable({
            \"sPaginationType\": \"full_numbers\",
            \"ordering\": false,
            \"language\": {
                \"lengthMenu\": \"Выводить _MENU_ записей на страницу\",
                \"zeroRecords\": \"Ничего не найдено, извините\",
                \"info\": \"Показано страниц _PAGE_ из _PAGES_\",
                \"infoEmpty\": \"Нет данных\",
                \"loadingRecords\": \"Загрузка...\",
                \"processing\": \"Обработка...\",
                \"infoFiltered\": \"\",
                \"paginate\": {
                    \"first\": \"В начало\",
                    \"last\": \"В конец\",
                    \"next\": \"Следующая\",
                    \"previous\": \"Предыдущая\"
                },
                \"emptyTable\": \"Нет данных\",
                \"search\": \"Поиск:\"
            }
        });

//        table.page(1).draw('page');
    } );



    //    \$('#myTabs a').click(function (e) {
    //        e.preventDefault()
    //        \$(this).tab('show')
    //    })
</script>
";
    }

    public function getTemplateName()
    {
        return "question_admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  259 => 110,  244 => 108,  234 => 101,  230 => 100,  217 => 90,  213 => 89,  206 => 84,  199 => 79,  191 => 77,  185 => 75,  182 => 74,  179 => 73,  177 => 72,  174 => 71,  168 => 70,  165 => 69,  162 => 68,  159 => 67,  157 => 66,  151 => 63,  148 => 62,  146 => 61,  139 => 57,  135 => 56,  126 => 50,  122 => 49,  119 => 48,  117 => 47,  114 => 46,  96 => 45,  94 => 44,  86 => 38,  80 => 36,  78 => 35,  57 => 16,  46 => 14,  42 => 13,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "question_admin.twig", "C:\\OSPanel\\domains\\PHP\\diplom\\templates\\question_admin.twig");
    }
}
