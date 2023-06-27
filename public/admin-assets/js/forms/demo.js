var form_builder_objact;
var form_builder_objact1;
jQuery(function ($) {
    var fields = [];

    var replaceFields = [
//    {
//      type: 'textarea',
//      subtype: 'tinymce',
//      label: 'tinyMCE',
//      required: true,
//    }
    ];

    var actionButtons = [];

    var templates = {};

    // test disabledAttrs
    var disabledAttrs = ['access', 'other'];

    var inputSets = [
        {
            label: 'Treatment Options',
            name: 'treatment_option', // optional
            fields: [{
                    "type": "radio-group", //checkbox-group
                    "required": true,
                    "label": "Select applicable treatment option",
                    "className": "treatment_options",
                    "name": "treatment_options",
                    "values": [
                        {
                            "label": "Option 1",
                            "value": "",
                            "selected": true
                        },
                        {
                            "label": "Option 2",
                            "value": ""
                        }
                    ]
                }]

//            label: 'Terms & Conditions',
//            name: 'terms-conditions', // optional
//            fields: [{
//                    type: 'header',
//                    subtype: 'h3',
//                    label: 'Terms & Conditions',
//                    className: 'header'
//                }, {
//                    type: 'paragraph',
//                    label: 'Terms and Conditions text.',
//                }, {
//                    type: 'paragraph',
//                    label: 'Terms and Conditions text.',
//                }, {
//                    type: 'checkbox',
//                    label: 'I accept the Terms and Conditions.',
//                }]
        },
        {
            label: 'Tests Options',
            name: 'tests_options', // optional
            tooltip: "tests_options",
            fields: [{
                    "type": "checkbox-group", //checkbox-group
                    "required": true,
                    "label": "Select Preferred Tests",
                    "className": "tests_options",
                    "name": "tests_options",

                    "values": [
                        {
                            "label": "Option 1",
                            "value": "",
                            "selected": true
                        },
                        {
                            "label": "Option 2",
                            "value": ""
                        }
                    ]
                }]
        }
    ];
    ;

    var typeUserDisabledAttrs = {
        autocomplete: ['access']
    };

    var typeUserAttrs = {
        text: {
            className: {
                label: 'Class',
                options: {
                    'red form-control': 'Red',
                    'green form-control': 'Green',
                    'blue form-control': 'Blue',
                },
                style: 'border: 1px solid red'
            },
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''
            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        },
        textarea: {
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''

            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        },
        select: {
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''
            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        },
        'checkbox-group': {
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''
            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        },
        'radio-group': {
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''
            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        },
        date: {
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''
            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        },
        number: {
            autoPopulate: {
                label: 'Auto Populate',
                type: "checkbox",
                checked: ''
            },
            showAlertOnValue: {
                label: 'Show Alert',
                type: "checkbox",
                checked: ''
            },
            alertValue: {
                label: 'Enter value to restrict user.',
                type: "text",
                value: ''
            },
            alertMessageTxt: {
                label: 'Enter Alert Message',
                type: "text",
                value: ''
            }
        }
    };
    // Register Event onAdd
    var typeUserEvents = {
        text: {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        },
        textarea: {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        },
        select: {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        },
        'checkbox-group': {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        },
        'radio-group': {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        },
        date: {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        },
        number: {
            onadd: function (fld) {
                fixCheckedPropForField(fld, "autoPopulate");
                fixCheckedPropForField(fld, "showAlertOnValue");
            }
        }
    };

    function fixCheckedPropForField(fld, fieldName) {
        // Retrieve the Checkbox as a jQuery object
        $checkbox = $(".fld-" + fieldName, fld);

        // According to the value of the attribute "value", check or uncheck
        if ($checkbox.val() == "true") {
            $checkbox.attr("checked", true);
        } else {
            $checkbox.attr("checked", false);
        }
    }
    ;

    var fbOptions = {
        subtypes: {
            text: ['datetime-local']
        },
        subtypes: {
            paragraph: ['a']
        },
        onSave: function (e, formData) {
//            generate_form(formData);
        },

        stickyControls: {
            enable: true
        },
        sortableControls: true,
        fields: fields,
        templates: templates,
        inputSets: inputSets,
        typeUserDisabledAttrs: typeUserDisabledAttrs,
        typeUserAttrs: typeUserAttrs,
        typeUserEvents: typeUserEvents,
        disableInjectedStyle: false,
        actionButtons: actionButtons,
        disableFields: ['autocomplete', 'file', 'button'],
        replaceFields: replaceFields,
        controlOrder: [
            'tests_options',
            'treatment_option',
            'text',
            'textarea',
            'paragraph',
            'anchor',
            'header',
            'checkbox-group',
            'radio-group',
            'select'
        ],
        disabledFieldButtons: {
            text: ['copy'],

        },
        // controlPosition: 'left'
        disabledAttrs
    };
    form_builder_objact = $('.build-wrap').formBuilder(fbOptions);
    form_builder_objact1 = $('.build-wrap1').formBuilder(fbOptions);

    setTimeout(function () {
        var formData_ = $("#json-data").val();
        if (formData_) {
            form_builder_objact.actions.setData(formData_);
        }

        var formData_1 = $("#json-data1").val();
        if (formData_1) {
            form_builder_objact1.actions.setData(formData_1);
        }

    }, 500);


});

function getdata1()
{

    var formData_ = $("#json-data").val();
    if (formData_) {
        form_builder_objact.actions.setData(formData_);
    }

    var formData_1 = $("#json-data1").val();
    if (formData_1) {
        form_builder_objact1.actions.setData(formData_1);
    }
}

function onsubmit_form() {
    var title = $('.form_title').val();

    if (title == '') {
        $('.form_check').addClass('form_error');
        $('.form_check').focus();
        $('.span_check').removeClass('display_button');
        return false;
    }


    $("#json-data").val(form_builder_objact.actions.getData('json', true));
    $("#stage1").remove();
    $("#json-data1").val(form_builder_objact1.actions.getData('json', true));
    $("#stage2").remove();
    return true;
}
function get_year() {
    var d = new Date();
    return d.getFullYear();
}
function converthtml(content) {
    var r = /(<([^>]+)>)/ig;
    return content.replace(r, "");
}
function replace_underscores(stringval) {
    var r = /(<([^>]+)>)/ig;
    stringval = stringval.replace(r, "");
    return stringval.split(' ').join('_');
}
