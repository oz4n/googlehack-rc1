<center> 
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id' => 'horizontalForm', 'htmlOptions' => array('class' => 'form-search')));
    echo $form->textFieldRow($model, 'key', array('class' => 'input-medium  span7', 'style' => 'margin-right: 5px;'));
    $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Search'));
    ?>
    <div style="margin-top: 2px; margin-right: 85px;">
        <?php
        echo $form->radioButtonListRow($model, 'cat', array('books' => 'Books', 'videos' => 'Videos', 'musiks' => 'Musiks', 'lyrics' => 'Lyrics', 'torrents' => 'Torrents', 'applications' => 'Applications', 'fonts' => 'Fonts'), array('style' => 'margin-left:5px;'));
        ?>
    </div>
    <?php 
    $this->endWidget(); 
    if (isset($dataProvider)) {
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'grid-file',
            'dataProvider' => $dataProvider,
            'type' => 'condensed',
            'template' => "{items}{pager}",
            'columns' => array(
                array(
                    'header' => '#',
                    'name' => 'id',
                    'htmlOptions' => array('width' => '10px')
                ),
                array(
                    'header' => 'Index of',
                    'type' => 'html',
                    'name' => 'value'
                ),
            ),
            'htmlOptions'=>array('class'=>'span12')
        ));
    }
    ?>
</center>   