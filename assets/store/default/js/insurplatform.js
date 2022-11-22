const URL_API = window.location.origin;
var urlCartItemMany = URL_API + "/api/v1/cart-items/many";
var totalStep = 0;
var packageInsur;
var unitPrice = 0;
var waitingTime = 0;
var parentCartItemId;
var insurancePeriodInformationTime = 1; // Thời hạn bảo hiểm là 1 năm
const controlType = [
    {
        id: 0,
        name: 'select'
    },
    {
        id: 1,
        name: 'radio'
    },
    {
        id: 2,
        name: 'checkbox'
    },
    {
        id: 3,
        name: 'text'
    },
    {
        id: 4,
        name: 'textarea'
    },
    {
        id: 5,
        name: 'datetime'
    },
    {
        id: 6,
        name: 'date'
    },
    {
        id: 7,
        name: 'file'
    },
    {
        id: 8,
        name: 'multipleselect'
    },
    {
        id: 9,
        name: 'address'
    },
];
const regexDefaultType = [
    {
        id: 0,
        name: 'number'
    },
    {
        id: 1,
        name: 'text'
    },
    {
        id: 2,
        name: 'text'
    },
    {
        id: 3,
        name: 'email'
    },
    {
        id: 4,
        name: 'file'
    }
];

const entityTypeCodeParent = ['PolicyTemplate_Policy_Period_Entity', 'PolicyTemplate_Policy_Owner_Entity'];
var childCartItemId = [];
var vehiclePlateStatusC = ['group-atc_VehiclePlateNumber'];
var vehiclePlateStatusK = ['group-atc_VehicleChassisNumber', 'group-atc_VehicleEngineNumber'];
var packageCodeMain = {
    status: false,
    code: ''
};
const conditionType = {
    Empty: 0, //Trống
    NotEmpty: 1, //Không trống
    TextIncluded: 2, //Văn bản bao gồm
    TextNotIncluded: 3,//Văn bản không bao gồm
    TextStarting: 4, //Văn bản bắt đầu bằng
    TextEnding: 5, //Văn bản kết thúc bằng
    TextExact: 6, //Văn bản chính xác
    GreaterThan: 7, //Lớn hơn
    LessThan: 8, //Nhỏ hơn
    GreaterThanOrEqualTo: 9,
    LessThanOrEqual: 10, //Nhỏ hơn hoặc bằng
    Equal: 11, //Bằng
    NotEqual: 12, //Không bằng
    Between: 13, //Ở giữa
    NotBetween: 14, //Không nằm trong khoảng
};
const types = [
    ['radio', 'checkbox'],
    ['select'],
    ['text', 'textarea', 'datetime', 'date'],
    ['multipleselect']
];

const groupTypes = [
    ['radio', 'checkbox', 'select', 'multipleselect'],
    ['text', 'textarea', 'datetime', 'date']
]
var template_code = '';
var titleStep = ['Chọn giá trị sản phẩm bảo hiểm', 'Điền thông tin bảo hiểm', 'Xác nhận thông tin bảo hiểm'];
var codeAttrSecret = ['HumanAges', 'DriversSeatCapacity', 'DriversAssistantSeatCapacity', 'PassengerSeatCapacity'];
var age = 30;
var rows = [];
let maxCarYearOfUsing = 9999;
const tempateCodeApplyPhysicalDamage = ['insur_physical_damage'];
const arrInputMaskMoney = ['CarMaxInsuranceAmount', 'CarValue', 'TotalInsuranceAmount'];
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "4000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
$(document).ready(function () {
    template_code = $('#data-product-insur').data('template_code');

    setTimeout(() => {
        var dataCartItems = $('#dataCartItems');
        var response = JSON.parse(dataCartItems.val());
        console.log(response);
        load_insurance(response);

        nextStep();
    }, 1);
});


// Lấy data theo phương thức ajax
function load_insurance(data) {
    waitingTime = data.salesProduct.insurancePeriodInformation.waitingTime;
    parentCartItemId = data.id;
    getAttributeSecret(data.attributes);
    renderPackage(data.salesProduct.products, data.salesProduct.benefits);
    renderInsurancePeriodInformation(data.salesProduct.insurancePeriodInformation);
    let attributes = data.attributes.map(item => {
        let values = data.attributeValues.filter(value => value.attributeId == item.attribute.id)   ;
        item.entityValue = values;
        return item;
    });
    mapDataFormConfigAndAttributeEntity(data.formConfigs, attributes);
    dateRangepicker();
    calculatorFeeStep1(data);
}

function dateRangepicker() {

    if ($('.datesinglepickerage').length) {
        $('#f_HumanAges').val(age);
        $('#f_DateOfBirth').val(moment().add(-age, 'years').format('DD/MM/YYYY'));
        $('.datesinglepickerage').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: false,
            startDate: moment().add(-age, 'years'),
            maxDate: moment().startOf('day').add(-30, 'day'),
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function (start, end, label) {
            $('#f_HumanAges').val(calculate_age(moment(start).toDate()));
            $('#f_DateOfBirth').val(moment(start).format('DD/MM/YYYY'));
            setViewAge(calculate_age(moment(start).toDate()));
        });
        setViewAge(age);
    }
}

function setViewAge(age){
    let txtAge = '';
    if(age >= 6){
        txtAge = age + ' tuổi';
    } else {
        txtAge = 'Dưới 6 tuổi'
    }
    $('#yourAge').html(txtAge);
}

function calculate_age(dob) {
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms);

    return Math.abs(age_dt.getUTCFullYear() - 1970);
}

function getAttributeSecret(attributes){
    var attrSecret = [];
    attributes.map(item => {
        if (codeAttrSecret.indexOf(item.attribute.code) > -1) {
            attrSecret.push(item.attribute)
        }
    });
    attrSecret.forEach(config => {
        $('.form-configs-data').append(Mustache.render($('#form-insurplatform-serect').html(), config));
    });
}

function insurancePeriodInformation(waitingTime) {
    setInputPolicyDate('f_PolicyEffectiveDate', moment().startOf('day').add(waitingTime, 'day').format());
    setInputPolicyDate('f_PolicyExpireDate', moment().startOf('day').add(waitingTime, 'day').add(insurancePeriodInformationTime, 'years').format());
    $('#I_PolicyExpireDate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoApply: false,
        startDate: moment().startOf('day').add(waitingTime, 'day').add(insurancePeriodInformationTime, 'years'),
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
    $('#I_PolicyEffectiveDate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoApply: false,
        startDate: moment().startOf('day').add(waitingTime, 'day'),
        minDate: moment().startOf('day').add(waitingTime, 'day'),
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function (start, end, label) {
        $('#I_PolicyExpireDate').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: true,
            startDate: moment(start).add(insurancePeriodInformationTime, 'years'),
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

    });

}

function setInputPolicyDate(elm, strDate){
    $('#'+elm).val(strDate);
}

function load_insurance_with_axios(data, url) {
    axios.post(url, data)
        .then(function (response) {
            if (response.data.code == '200'){
                // console.log(response.data);

                // $('.insurplatform-step-charged').html(Mustache.render($('#insurplatform-step-charged').html(), response.data));
            }

        })
        .catch(function (error) {
            console.log(error);
        });

}

function renderPackage(packages, benefits){
    var mainPackage = [], subPackage = [];
    var mainPackageBenefits = [], subPackageBenefits = [];
    packages.map(item => {
        let elm = item.elementaryProducts.filter(x => x.type == 0);
        let elmSub = item.elementaryProducts.filter(x => x.type == 1);


        let elmItem = elm.map(x => {
            return {
                ...x,
                id: x.id,
                productCode: item.code,
                insuranceBusinessId: item.insuranceBusinessId,
                productName: item.name
            }
        });

        let elmSubItem = elmSub.map(x => {

            return {
                ...x,
                id: x.id,
                productCode: item.code,
                insuranceBusinessId: item.insuranceBusinessId,
                productName: item.name
            }
        });
        mainPackage = mainPackage.concat(elmItem);
        subPackage = subPackage.concat(elmSubItem);
    });

    mainPackage.map(item => {

        let data = getPackageBenefits(item, benefits, 1);
        mainPackageBenefits.push(data);
    });

    subPackage.map(item => {
        let data = getPackageBenefits(item, benefits, 1);
        subPackageBenefits.push(data);
    });

    packageInsur = {
        mainPackageBenefits: mainPackageBenefits,
        subPackageBenefits: subPackageBenefits,
    };
    rennderGroupPackage(packageInsur);
    $('.sub-benefit').on('change', function () {
        var arrBenefit = [];
        $('.sub-benefit:checked').each(function (index, value) {
            arrBenefit.push($(this).val())
        });
        $('.f_package-sub').val(arrBenefit.toString());
        $('#FeeNumber').html(0 + ' <u>đ</u>');
        $('.btn-choose-insur').hide();
        $('.btn-calculator').fadeIn();
        viewSubPackage(arrBenefit)
    });
}

// render package  theo template code
function rennderGroupPackage(packageInsur) {
    if (template_code == 'insur_motobike'){
        let arrBenefit = [];
        packageInsur.mainPackageBenefits.map(item => {
            item.benefits.map(x => {
                arrBenefit.push(x.code);
            })
        });
        $('.f_package-main').val(arrBenefit.toString()); // gán danh sách quyền lợi chính

        $('.group-package-main').html(Mustache.render($('#package-insur-main').html(), packageInsur));
        $('.group-package-sub').html(Mustache.render($('#package-insur-sub').html(), packageInsur));
        $('.list-sub-page').html(Mustache.render($('#package-insur-sub-view').html(), packageInsur));
        $('.list-main-package').html(Mustache.render($('#package-insur-main-view').html(), packageInsur));
    }
    if (template_code == 'insur_physical_damage'){
        let arrBenefit = [];
        packageInsur.mainPackageBenefits.map(item => {
            item.benefits.map(x => {
                arrBenefit.push(x.code);
            })
        });
        $('.f_package-main').val(arrBenefit.toString()); // gán danh sách quyền lợi chính
        $('.group-package-main').html(Mustache.render($('#package-insur-main-damage').html(), packageInsur));
        $('.list-main-package').html(Mustache.render($('#package-insur-main-damage-view').html(), packageInsur));
    }
    if (template_code == 'insur_car'){
        let codePersonInCar = 'NNTXOTO';
        let attrbuteSecret = ['DriversSeatCapacity', 'DriversAssistantSeatCapacity', 'PassengerSeatCapacity']
        let arrBenefit = [];
        packageInsur.mainPackageBenefits.map(item => {
            item.benefits.map(x => {
                arrBenefit.push(x.code);
            })
        });
        let arrAddSubPackage = [];
        let arrAddSubPackagePeople = [];
        console.log(packageInsur.subPackageBenefits);
        packageInsur.subPackageBenefits.map(x => {
            if (x.code !== codePersonInCar){
                arrAddSubPackage.push(x);
            }
            if (x.code == codePersonInCar){
                arrAddSubPackagePeople.push(x);
            }
        })

        let addPackageInsur = {
            subPackageBenefits: arrAddSubPackage
        }
        let addPackageInsurPeople = {
            subPackageBenefits: arrAddSubPackagePeople
        }
        $('.f_package-main').val(arrBenefit.toString()); // gán danh sách quyền lợi chính
        $('.group-package-main').html(Mustache.render($('#package-insur-car-main').html(), packageInsur));
        $('.group-package-sub').html(Mustache.render($('#package-insur-car-sub').html(), addPackageInsur));
        $('.group-package-sub-people').html(Mustache.render($('#package-insur-car-sub-people').html(), addPackageInsurPeople));

        $('.list-main-package').html(Mustache.render($('#package-insur-main-view').html(), packageInsur));
        $('.list-sub-page').html(Mustache.render($('#package-insur-car-sub-view').html(), addPackageInsur));
        $('.box-list-sub-for-person').html(Mustache.render($('#package-insur-car-sub-people-view').html(), addPackageInsurPeople));

        $('input[name="' + codePersonInCar +'"]').on('change', function () {
            $('#TotalInsuranceAmount').val('');
            $('#f_TotalInsuranceAmount').val('');
            $('.valueTotalInsuranceAmount').html('');
            if ($(this).is(':checked')) {
                $('.group-atc_TotalInsuranceAmount').show();
                $('.box-list-sub-for-person').show();
            } else {
                $('.group-atc_TotalInsuranceAmount').hide();
                $('.box-list-sub-for-person').hide();
            }
        })

        $('#removeSubpackage').on('click', function () {
            $('.btn-choose-insur').hide();
            $('.btn-calculator').fadeIn();
            $(".form-radio-subpackage").each(function (i, x) {
                if ($(this).prop('checked')){
                    $(this).prop('checked', false);
                    let arrBenefit = [];
                    $('.sub-benefit:checked').each(function (index, value) {
                        arrBenefit.push($(this).val())
                    });
                    $('.f_package-sub').val(arrBenefit.toString());
                }
            });
        })
    }
    if (template_code == 'insur_health'){
        let _packageInsurSort = {
            mainPackageBenefits: packageInsur.mainPackageBenefits.sort(dynamicSort('maxInsuranceAmount')),
            subPackageBenefits: packageInsur.subPackageBenefits,
        }
        $('.group-package-main').html(Mustache.render($('#package-insur-health-main').html(), _packageInsurSort));

        $('.group-package-sub').html(Mustache.render($('#package-insur-health-sub').html(), packageInsur));
        $('.box-insurance-product').hide();

        $('.list-sub-page').html(Mustache.render($('#package-insur-health-sub-view').html(), packageInsur));
        $('.list-main-package').html(Mustache.render($('#package-insur-health-main-view').html(), packageInsur));

        $(".chosen-select").select2();
        //Chọn giá trị quyền lợi chính
        $('.select-main-package').on('change', function () {
            let indexBenefit = packageInsur.mainPackageBenefits.findIndex(x => x.code == $(this).val());
            let arrBenefit = [];
            resetActionHealhSub();
            if (indexBenefit > -1){
                packageInsur.mainPackageBenefits[indexBenefit].benefits.map(x => {
                    arrBenefit.push(x.code);
                });
                $('.f_package-main').val(arrBenefit.toString()); // gán danh sách quyền lợi chính
                packageCodeMain = {
                    status: true,
                    code: $(this).val()
                }
                selectSubPackage(packageCodeMain.code);
                viewPackageMain(packageCodeMain.code);
            } else {
                $('.f_package-main').val('');

                packageCodeMain = {
                    status: false,
                    code: ''
                }
            }

        })

    }
}

function dynamicSort(property) {
    var sortOrder = 1;
    if (property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a, b) {
        /* next line works with strings and numbers,
         * and you may want to customize it to your needs
         */
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
}

function viewPackageMain(code) {
    $('.list-main-package .package').hide();
    $('.list-main-package .package[data-package="' + code + '"]').fadeIn();
}

function resetActionHealhSub(){
    $('.form-check-input ').prop('checked', false);
    $('.f_package-sub').val('');
    $('#FeeNumber').html(0 + ' <u>đ</u>');
    $('.btn-choose-insur').hide();
    $('.data-sub-package').hide();
    $('.btn-calculator').fadeIn();
}


function selectSubPackage(code) {
    $('.box-insurance-product').hide();
    $('.box-insurance-product[data-code="'  + code + '"]').show();

}


function viewSubPackage(arrBenefit) {
    if (arrBenefit.length > 0){
        $('.box-list-sub-page').show();
        $('.data-sub-package').hide();
        $('.data-sub-package').each(function () {
            let code = $(this).attr('data-code');
            if (packageCodeMain.status == true){
                let productcode = $(this).attr('data-productcode');
                let index = arrBenefit.indexOf(code);
                if (index > -1 && productcode == packageCodeMain.code) {
                    $(this).show()
                }

            } else {
                /* console.log(arrBenefit);
                console.log(code); */
                let index = arrBenefit.indexOf(code);
                if (index > -1) {
                    $(this).show()
                }
            }

        });
    } else {
        $('.box-list-sub-page').hide();
    }


}


function initValueInsur(){
    var arrBenefit = [];
    $('.sub-benefit:checked').each(function (index, value) {
        arrBenefit.push($(this).val())
    });
    $('.f_package-sub').val(arrBenefit.toString());


    $(".form-control-config[data-fee='1']").each(function () {
        let fid = $(this).attr('data-fid');
        let id = fid.replace('f_', '');
        let dataMask = $(this).attr('data-mask');
        if (dataMask == 'currency') {
            $('#' + fid).val($(this).maskMoney('unmasked')[0] * 1000);
        } else {
            $('#' + fid).val($(this).val());
        }
        $('#' + fid).attr('data-name', $(this).attr('data-label'));
        if ($(this).attr('type') == 'radio'){
            if ($('[name="' + id +'"]:checked').length == 0){
                $('[name="' + id + '"]:last').prop('checked', true);
            }
        }

    });
}

function getBenefitByCode(code, benefits) {
    let index = benefits.findIndex(x => x.code == code);
    if(index > -1){
        return benefits[index];
    } else {
        return null
    }
}

function getPackageBenefits(item, benefits, status){
    let benefitConfigurations ;
    let arrSubBenefits = [];
    if (item.benefitConfig && item.benefitConfig.find(x => x.benefitConfigurations && x.benefitConfigurations.length > 0)){
        benefitConfigurations = item.benefitConfig.find(x => x.benefitConfigurations.length > 0).benefitConfigurations;
        $.each(benefitConfigurations, function (index, val) {
            if (val.status == status && getBenefitByCode(val.benefitCode, benefits) != null) {
                let item = {
                    ...val,
                    insuranceAmountDisplay: new Intl.NumberFormat().format(val.insuranceAmount),
                    insuranceAmountPerObjectDisplay: new Intl.NumberFormat().format(val.insuranceAmountPerObject),
                    name: getBenefitByCode(val.benefitCode, benefits).name,
                    code: val.benefitCode,
                };
                arrSubBenefits.push(item)
            }
        });
        let arr = [];
        arrSubBenefits.map(code => {
            arr.push(code.code)
        })
        let data = {
            id: item.id,
            packageId: item.id,
            name: item.name,
            code: item.code,
            productCode: item.productCode,
            benefitCode: arr.toString(),
            productName: item.productName,
            insuranceBusinessId: item.insuranceBusinessId,
            benefits: arrSubBenefits,
            config: item.config,
            maxInsuranceAmount: item.benefitConfig[0].maxInsuranceAmount,
            maxInsuranceAmountDisplay: new Intl.NumberFormat().format(item.benefitConfig[0].maxInsuranceAmount),
            status: item.benefitConfig[0].status,
            type: item.benefitConfig[0].type
        };

        return data;
    }

}

/**
 * Thông tin thời hạn bảo hiểm
 * Giai đoạn này sẽ áp dụng toàn bộ là 1 năm. Sẽ update sau
 */
function renderInsurancePeriodInformation(insurancePeriodInformation){


}

//map data - cần hàm để G các thuộc tính lại với nhau - cần applyCondition - cần hàm bắt sự kiện onchange giá trị thuộc tính
/**
 * Xử lý và render thuộc tính
 * @param {*} formConfigs
 * @param {*} attributeEntities
 */
function mapDataFormConfigAndAttributeEntity(formConfigs, attributeEntities) {
    let formConfigAttributeEntity = formConfigs.map(formConfig => {
        let index = attributeEntities.findIndex(attr => attr.attribute.id == formConfig.attributeId);

        let attrbute;
        let nameGroupInStep = formConfig.groupInStep;
        if (index > -1) {
            let name = attributeEntities[index].entityAttributeUIConfig && attributeEntities[index].entityAttributeUIConfig.name ? attributeEntities[index].entityAttributeUIConfig.name : attributeEntities[index].attribute.name;
            attrbute = {
                ...attributeEntities[index].attribute,
                name: name
            }
        }

        let formConfigAttr = {
            ...formConfig,
            stepID: JSON.parse(formConfig.representativeName).step,
            groupID: JSON.parse(formConfig.representativeName).group,
            entityAttribute: index > -1 ? attributeEntities[index].entityAttribute : null,
            entityAttributeUIConfig: index > -1 ? attributeEntities[index].entityAttributeUIConfig : null,
            attribute: index > -1 ? attrbute : null,
            entityValue: attributeEntities[index].entityValue
        }
        return formConfigAttr;
    });


    let controls = [];

    orderByArray(formConfigAttributeEntity, 'indexInStep').map(item => {
        let control = {
            attributeId: item.attributeId,
            name: item.attribute.code,
            attributeCode: item.attribute.code,
            label: item.attribute.name,
            stepID: item.stepID,
            groupID: item.groupID,
            step: item.step,
            groupInStep: item.groupInStep,
            indexInStep: item.indexInStep,
            value: "",
            type: getNameById(item.entityAttributeUIConfig.controlType),
            required: item.entityAttributeUIConfig.isRequired,
            options: {},
            validators: {},
            hasEndorsementBusinessProcess: item.hasEndorsementBusinessProcess,
            hasUpdateBusinessProcess: item.hasUpdateBusinessProcess,
            allowToInputInOrder: item.allowToInputInOrder,
            entityValue: orderByArray(item.entityValue, 'index'),
            entityAttributeUIConfig: item.entityAttributeUIConfig,
            entityTypeCode: item.attribute.entityTypeCode,
            typeAttributeParent: setTypeAttributeParent(item.attribute.entityTypeCode),
            customRegex: item.entityAttributeUIConfig.valueTemplate.customRegex,
            defaultRegexType: getNameByIdInArray(item.entityAttributeUIConfig.valueTemplate.defaultRegexType, 'text', regexDefaultType),
            maxLength: item.entityAttributeUIConfig.valueTemplate.maxLength ? item.entityAttributeUIConfig.valueTemplate.maxLength : 9999,
            middleLetters: item.entityAttributeUIConfig.valueTemplate.middleLetters ,
            minLength: item.entityAttributeUIConfig.valueTemplate.minLength ? item.entityAttributeUIConfig.valueTemplate.minLength : 0,
            prefixLetters: item.entityAttributeUIConfig.valueTemplate.prefixLetters,
            regexType: item.entityAttributeUIConfig.valueTemplate.regexType,
            suffixLetters: item.entityAttributeUIConfig.valueTemplate.suffixLetters,
        };
        controls.push(control);
    });

    let attributeGroupByStep = groupBy(controls, 'stepID');

    Object.keys(attributeGroupByStep).forEach((value, key) => {
        totalStep++;
    });

    let formData = {
        step_1: attributeGroupByStep['1'],
        step_2: attributeGroupByStep['2']
    };
    renderFormInsurPlatform(controls);

    let attributeGroupByID = groupBy(formData.step_2, 'groupID');

    let arrAttributeGroupByID = [];
    Object.keys(attributeGroupByID).forEach((value, key) => {
        if(value > 1){
            arrAttributeGroupByID.push(attributeGroupByID[value]);
        }

    });
    renderFormConfigs(formData.step_1, '#form-group-configs');
    arrAttributeGroupByID.map((item, index) => {
        if (template_code == 'insur_physical_damage' && (index == 2 || index == 3)){
            $('#form-group-information').append(Mustache.render($('#title-group-attr-copy').html(), item[0]));
        } else if (template_code == 'insur_health' && index == 1){
            $('#form-group-information').append(Mustache.render($('#title-group-attr-copy').html(), item[0]));
        } else if (template_code == 'insur_car' && index == 2) {
            $('#form-group-information').append(Mustache.render($('#title-group-attr-copy').html(), item[0]));
        }
        else {
            $('#form-group-information').append(Mustache.render($('#title-group-attr').html(), item[0]));
        }
        
        renderFormConfigs(item, '#form-group-information');
    })
    let dataAttribute = initDataRender(formData.step_2);
    addValidation();
    handleFormInfoChange(dataAttribute);
    initValueInsur();
    updateInputValue();
    numberIncrementButtons('.group-atc_SeatCapacity', 2, 9999);
    actionInput();
    actionBeforeRender();

}

/**
 * Xử lý các input sau khi được render
 */
function actionInput() {
    if ($('.form-control-date').length) {
        $('.form-control-date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: false,
            startDate: moment().add(-age, 'years'),
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    }
    $('input[name="TotalInsuranceAmount"]').on('change', function () {
        let price = $(this).val();
        $('.valueTotalInsuranceAmount').html(price + ' <u>đ</u>/vụ');
    });


    //
    $('[name="CarBrand"]').html('<option selected value="null">Chọn giá trị</option>');
    $('[name="CarCompany"]').html('<option selected value="null">Chọn giá trị</option>');

    $('[name="CarMaxInsuranceAmount"]').on('change', function () {
        let carPrice = $('[name="CarValue"]').val();  
        let carMaxInsuranceAmount = $(this).val();
        if (carPrice * 0.95 > carMaxInsuranceAmount || carPrice*1.05 < carMaxInsuranceAmount ){
            toastr.error('Số tiền yêu cầu bảo hiểm không được chênh lệch quá 5% giá trị xe!');
        }
    });
    maskMoneyInput();
    copyInsuranceInfomation();
}


function maskMoneyInput() {
    arrInputMaskMoney.map(item => {
        $('#' + item).attr('type', 'text');
        $('#' + item).attr('data-mask', 'currency');
        $('#' + item).maskMoney({ precision : 0});
    })
}
/**
 * Các hành động dành cho xử lý sau renđer thuộc tính
 */
function actionBeforeRender() {
    let indexTemplateCode = tempateCodeApplyPhysicalDamage.indexOf(template_code);
    if (indexTemplateCode > -1) {
        progressCarInsuranceProduct(true);
    }

}

function addValidation() {

    let jsonData = {
        "rows": rows
    };

    let validationMessages = {},
        validationRulesRequired = {},
        validationRulesType = {},
        validationRules;

    $.each(jsonData.rows, function (key, value) {
        $.each(value, function (ikey, ivalue) {
            // generate validation messages
            if (ivalue.ValidationMessage) {
                validationMessages[ivalue.Name] = {
                    ['required']: ivalue.ValidationMessage,
                    ['maxlength']: 'Vui lòng nhập không quá ' + ivalue.Maxlength + ' ký tự.',
                    ['minlength']: 'Vui lòng nhập ít nhất ' + ivalue.Minlength + ' ký tự.',
                };
            }

            validationRulesRequired[ivalue.Name] = {
                ['required']: ivalue.IsRequired,
                ['maxlength']: ivalue.Maxlength,
                ['minlength']: ivalue.Minlength,
            };

        });
    });
    validationRules = $.extend(true, {}, validationRulesRequired, validationRulesType);
    let validationRuleMsgs = $.extend(true, {}, validationMessages, validationRulesType);

    $("#signupForm").validate({
        rules: validationRules,
        messages: validationRuleMsgs
    });
}

function setTypeAttributeParent(entityTypeCode){
    let index = entityTypeCodeParent.findIndex(x => x == entityTypeCode);
    if (index > -1) {
        return 1
    } else {
        return 0
    }
}

function updateInputValue() {
    $(".form-control-config[data-fee='1']").on('change', function () {
        let fid = $(this).attr('data-fid');

        let dataMask = $(this).attr('data-mask');
        if (dataMask == 'currency') {
            $('#' + fid).val($(this).maskMoney('unmasked')[0] * 1000);
        } else {
            $('#' + fid).val($(this).val());
        }
        $('#' + fid).attr('data-name', $(this).attr('data-label'));
        $('#FeeNumber').html(0 + ' <u>đ</u>');
        $('.btn-choose-insur').hide();
        $('.btn-calculator').fadeIn();
    });
    $('.form-control-config').on('change', function () {
        let fid = $(this).attr('data-fid');
        let dataMask = $(this).attr('data-mask');
        let dataName = $(this).attr('name');
        
        if (dataMask == 'currency'){
            $('#' + fid).val($(this).maskMoney('unmasked')[0] * 1000);
        } else {
            $('#' + fid).val($(this).val());
        }
        
        $('#' + fid).attr('data-name', $(this).attr('data-label'));

        let dataType = $(this).attr('data-type');
        if (dataType == 'select') {
            $('#' + fid).attr('data-name', $(this).val());
        }
        if (dataType == 'radio') {
            $('#' + fid).attr('data-name', $("input[name='" + dataName + "']:checked").attr('data-name'));
            $('#' + fid).val($("input[name='" + dataName + "']:checked").val());
        }

    });
}

function orderByArray(values, orderProperty) {
    return values.sort((a, b) => {
        if (a[orderProperty] < b[orderProperty]) {
            return -1;
        }
        if (a[orderProperty] > b[orderProperty]) {
            return 1;
        }
        return 0;
    });
}
function groupBy(array, key){
    // Return the end result
    return array.reduce((result, currentValue) => {
        // If an array already present for key, push it to the array. Else create an array and push the object
        (result[currentValue[key].toString()] = result[currentValue[key]] || []).push(
            currentValue
        );
        // Return the current iteration `result` value, this will be taken as next iteration `result` value and accumulate
        return result;
    }, {}); // empty object is the initial value for result object
}
function getNameById(id) {
    let index = controlType.findIndex(x => x.id == id);
    let name = '';
    if (index > -1) {
        name = controlType[index].name;
    }
    return name;
}

function renderFormInsurPlatform(controls){
    controls.forEach(config => {
        $('.form-configs-data').append(Mustache.render($('#form-insurplatform').html(), config));
    });

    setTimeout(() => {
        insurancePeriodInformation(waitingTime);
    }, 1);
}

function renderFormConfigs(formConfigs, elm){

    formConfigs.forEach(config => {
        switch (config.type) {
            case 'select':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'radio':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'checkbox':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'text':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'textarea':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'datetime':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'date':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'file':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'multipleselect':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
            case 'address':
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;

            default:
                $(elm).append(Mustache.render($('#control-' + config.type).html(), config));
                break;
        }
        setFormValidation(config);
    });
}

function setFormValidation(config) {
    let arr = [];
    let item = {
        "Name": config.name,
        "IsRequired": config.required,
        "Datatype": "string",
        "Maxlength": config.maxLength,
        "Minlength": config.minLength,
        "InputLabel": config.label,
        "InputInitialValue": "",
        "InputSourceChannel": "constant",
        "ValidationMessage": "Trường thông tin bắt buộc."
    };
    arr.push(item);

    rows.push(arr);


}

function calculatorFeeStep1(data){
    var cardId = data.cartId;
    var parentItemId = data.id;


    $('body').on('click', '#calculatorFee', function () {
        var cartItems = [];
        let valPackageSub = $('.f_package-sub').val();
        let valPackageMain = $('.f_package-main').val();
        let attributeValues = [];
        getAllAttributeCalculator();
        
        $('.form-control-config').each(function (i, obj) {
            let fid = $(this).attr('data-fid');
            let dataType = $(this).attr('data-type');
            let dataMask = $(this).attr('data-mask');
            let dataName = $(this).attr('name');
            if (dataMask == 'currency') {
                $('#' + fid).val($(this).maskMoney('unmasked')[0] * 1000);
            } else {
                $('#' + fid).val($(this).val());
            }


            if (dataType == 'radio') {
                $('#' + fid).attr('data-name', $("input[name='" + dataName + "']:checked").attr('data-name'));
                $('#' + fid).val($("input[name='" + dataName + "']:checked").val());
            } else if (dataType == 'checkbox') {
                $('#' + fid).attr('data-name', $(this).attr('data-name'));
            } else if (dataType == 'select') {

            } else {
                $('#' + fid).attr('data-name', $(this).val());
            }



        });

        $('.f_step_1').each(function (i, obj) {
            console.log($(this));
            var _this = $(this);
            let item = {
                value: _this.val(),
                name: _this.attr('data-name'),
                attributeId: _this.attr('data-attribute'),
            }
            attributeValues.push(item);
        });

        packageInsur.mainPackageBenefits.forEach(benefit => {
            let elementaryProductCodes = '';
            if (benefit.config != null) {
                elementaryProductCodes = benefit.config.elementaryProductCodes
            }

            let indexMainBenefit = benefit.benefits.findIndex(x => valPackageMain.indexOf(x.benefitCode) > -1);

            let options = benefit.benefits.map(x => {
                let item = {
                    optionTitle: x.name,
                    optionId: x.id,
                    optionType: 0,
                    optionValue: x.insuranceAmountPerObject.toString()
                };

                return item;
            });

            let item = {
                parentItemId: parentItemId,
                productCode: benefit.code,
                productName: benefit.name,
                productModel: "ElementaryProduct",
                bundleOptionCode: benefit.productCode,
                bundleOptionName: benefit.productName,
                insuranceBussinessId: benefit.insuranceBusinessId.toString(),
                quantity: 1,
                dependOnProductCode: '', // Gói phụ phụ thuộc vào code cuar gói chính
                attributeValues: attributeValues,
                options: options
            }

            if (indexMainBenefit > -1 && ((packageCodeMain.status && packageCodeMain.code == benefit.code) || !packageCodeMain.status)){
                cartItems.push(item);
            }
        });

        packageInsur.subPackageBenefits.forEach(benefit => {
            let elementaryProductCodes = '';
            if (benefit.config != null){
                elementaryProductCodes = benefit.config.elementaryProductCodes
            }


            if (template_code == 'insur_car'){
                let indexBenefit = valPackageSub.indexOf(benefit.id);
                let options = benefit.benefits.map(x => {
                    let item = {
                        optionTitle: x.name,
                        optionId: x.id,
                        optionType: 0,
                        optionValue: x.insuranceAmountPerObject.toString()
                    };

                    return item;
                });

                let item = {
                    parentItemId: parentItemId,
                    productCode: benefit.code,
                    productName: benefit.name,
                    productModel: "ElementaryProduct",
                    bundleOptionCode: benefit.productCode,
                    bundleOptionName: benefit.productName,
                    insuranceBussinessId: benefit.insuranceBusinessId.toString(),
                    quantity: 1,
                    dependOnProductCode: elementaryProductCodes, // Gói phụ phụ thuộc vào code cuar gói chính
                    attributeValues: [],
                    options: options
                }

                if (indexBenefit > -1) {
                    cartItems.push(item);
                }
            } else {
                let indexBenefit = benefit.benefits.findIndex(x => valPackageSub.indexOf(x.benefitCode) > -1);
                let options = benefit.benefits.map(x => {
                    let item = {
                        optionTitle: x.name,
                        optionId: x.id,
                        optionType: 0,
                        optionValue: x.insuranceAmountPerObject.toString()
                    };

                    return item;
                });

                let item = {
                    parentItemId: parentItemId,
                    productCode: benefit.code,
                    productName: benefit.name,
                    productModel: "ElementaryProduct",
                    bundleOptionCode: benefit.productCode,
                    bundleOptionName: benefit.productName,
                    insuranceBussinessId: benefit.insuranceBusinessId.toString(),
                    quantity: 1,
                    dependOnProductCode: elementaryProductCodes, // Gói phụ phụ thuộc vào code cuar gói chính
                    attributeValues: [],
                    options: options
                }

                if (indexBenefit > -1 && ((elementaryProductCodes == packageCodeMain.code && packageCodeMain.status) || !packageCodeMain.code)) {
                    cartItems.push(item);
                }

            }

        });

        let parentAttributeValues = [];
        $('.f_step_input').each(function (i, obj) {
            if (parseInt($(this).data('typecode')) === 1) {
                // Danh chho thuộc tính parent
                let item = {
                    value: $(this).val(),
                    name: $(this).attr('data-name'),
                    attributeId: $(this).attr('data-attribute'),
                }
                parentAttributeValues.push(item);
            } 
        });
        var body = {
            parentAttributeValues: parentAttributeValues,
            cartItems: cartItems
        };
        
        if (validationFeeCarDamage() && validationCar()){
            cart_items_many_axios(cardId, body, urlCartItemMany);
            getDataInputStep1();
        }
        
    });
}

function getAllAttributeCalculator() {
    $("input:radio.form-control-config[data-fee='1']:checked").each(function (i, obj) {
        let fid = $(this).attr('data-fid');
        let dataMask = $(this).attr('data-mask');
        if (dataMask == 'currency') {
            $('#' + fid).val($(this).maskMoney('unmasked')[0] * 1000);
        } else {
            $('#' + fid).val($(this).val());
        }
        $('#' + fid).attr('data-name', $(this).attr('data-label'));
    });
}
function getDataInputStep1() {
    let arrValueFormatCurrency = ['CarDeduction'];
    $('.attribute-configs').html('');
    $("[data-fee='1']").each(function (i, obj) {
        let attrName =  $(this).attr('name');
        let attrVal = '';
        let indexOf = arrValueFormatCurrency.indexOf(attrName);
        if ( $(this).attr('type') == 'radio'){
            if ($(this).is(":checked")) {
                attrVal = indexOf > -1 ? new Intl.NumberFormat().format($(this).attr('data-name')) + ' <u>đ</u>' : $(this).attr('data-name');
                $('.attribute-configs').append(renderConfigFee($(this).attr('data-label'), attrVal));
            }
        } else if ($(this).attr('type') == 'checkbox') {
            if ($(this)[0].checked) {
                attrVal = indexOf > -1 ? new Intl.NumberFormat().format($(this).attr('data-name')) + ' <u>đ</u>' : $(this).attr('data-name');
                $('.attribute-configs').append(renderConfigFee($(this).attr('data-label'), attrVal));
            }
        } else {
            attrVal = indexOf > -1 ? new Intl.NumberFormat().format($(this).val()) + ' <u>đ</u>' : $(this).val();
            $('.attribute-configs').append(renderConfigFee($(this).attr('data-label'), attrVal));
        }
    });
}

function renderConfigFee(label, name){
    let elm =  '<div class="feature">' 
        + '<div class="label"><span class="biicon bi bi-x-diamond-fill"></span>' + label +  '</div>'
        + '<div class="value">' + name  + '</div>'
        + '</div>';                                   
                                        
    return elm;
}

function cart_items_many_axios(cardId, data, url) {
    var formData = new FormData();
    formData.append($('insuranceExtraData_deliverableItems'), JSON.stringify(data));
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": url,
        "method": "POST",
        "headers": {
            "Content-Type": "application/json",
            "cache-control": "no-cache",
            "x-cart-id-uuid": cardId
        },
        "processData": false,
        "data": JSON.stringify(data)
    }
    showLoading();
    $.ajax(settings).done(function (response) {
        let data = JSON.parse(response);
        let cart_items = data.cart_items;
        if (cart_items != null){
            calculatorFee(cart_items);
            renderVariation(cart_items);
            hideLoading();
            vehiclePlateStatusK.map(className => {
                $('.' + className).hide();
            });
        } else {
            hideLoading();
            toastr.error('Không tính được phí. Vui lòng thử lại!');
        }

    });

}

function renderVariation(packages) {
    $('.group-variation-insurplatform').html('');
    // variation-package
    packages.map(package => {
        $('.group-variation-insurplatform').append(Mustache.render($('#variation-package').html(), package));
    })

}

function getInputCalculatorFee(){
    $('.f_step_1').each(function (index, value) {
        console.log($(this).val());
    });
}

function cart_items_many(cardId, data, url) {
    var formData = new FormData();
    formData.append($('insuranceExtraData_deliverableItems'), JSON.stringify(data));
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": url,
        "method": "POST",
        "headers": {
            "Content-Type": "application/json",
            "cache-control": "no-cache",
            "x-cart-id-uuid": cardId
        },
        "processData": false,
        "data": JSON.stringify(data)
    }

    $.ajax(settings).done(function (response) {
        console.log(response);
    });
}

function calculatorFee(data) {
    unitPrice = 0;
    data.map(item => {
        getChildCartItemId(packageInsur.mainPackageBenefits, item);
        unitPrice = unitPrice +  item.unitPrice
    });
    $('#FeeNumber').html(new Intl.NumberFormat().format(unitPrice) + ' <u>đ</u>');
    $('.sale-price').attr('data-price', unitPrice).html(new Intl.NumberFormat().format(unitPrice));
    $('.btn-choose-insur').removeClass('disabled').attr('disabled', false);
    $('.btn-calculator').hide();
    $('.btn-choose-insur').fadeIn();

}

function nextStep() {
    $('body').on('click', '.btn-choose-insur', function () {
        hideElem();
        // changeVehiclePlateStatus();
        $('.insurance-step[data-step="2"]').show();
        $('.group-button[data-step="2"]').show();
        $('.step-name').html(titleStep[1]);
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#mainProductInsurance").offset().top
        }, 1);
    });
    $('body').on('click', '#checkValid', function () {
        var valid = $("#signupForm").valid();  // test the form for validity
        // console.log(valid);
        if(valid){
            hideElem();
            getAllData();
            $('.back-to-step').attr('data-step', 2);
            $('.insurance-step[data-step="2"]').show().addClass('insurance-information-review');
            $('.group-button[data-step="3"]').show();
            $('.step-name').html(titleStep[2]);
        }

    });

    $('body').on('click', '.back-to-step', function () {
        var step = $(this).attr('data-step');
        switch (step) {
            case '1':
                hideElem();
                $('.insurance-step[data-step="1"]').show();
                $('.group-button[data-step="1"]').show();
                $('.step-name').html(titleStep[0]);
                break;
            case '2':
                hideElem();
                $('.back-to-step').attr('data-step', 1);
                $('.insurance-step[data-step="2"]').show().removeClass('insurance-information-review');
                $('.group-button[data-step="2"]').show();
                $('.step-name').html(titleStep[1]);
                break;
            default:
                hideElem();
                $('.insurance-step[data-step="1"]').show();
                $('.group-button[data-step="1"]').show();
                $('.step-name').html(titleStep[0]);
                break;
        }
    })
}

function hideElem() {
    $('.insurance-step').removeClass('show');
    $('.group-button').removeClass('show');
    $('.insurance-step').hide();
    $('.group-button').hide();
}

function getAllData() {
    let childAttributeValues = [];
    let parentAttributeValues = [];
    $('.form-control-config').each(function (i, obj) {
        let fid = $(this).attr('data-fid');
        let dataType = $(this).attr('data-type');
        let dataMask = $(this).attr('data-mask');
        let dataName = $(this).attr('name');
        if (dataMask == 'currency') {
            $('#' + fid).val($(this).maskMoney('unmasked')[0] * 1000);
        } else {
            $('#' + fid).val($(this).val());
        }
        

        if (dataType == 'radio'){
            $('#' + fid).attr('data-name', $("input[name='" + dataName + "']:checked").attr('data-name'));
            
            $('#' + fid).val($("input[name='" + dataName + "']:checked").val());
        } else if (dataType == 'checkbox') {
            $('#' + fid).attr('data-name', $(this).attr('data-name'));
        } else if (dataType == 'select') {

        } else {
            $('#' + fid).attr('data-name', $(this).val());
        }



    });
    $('.f_step_input').each(function (i, obj) {

        if (parseInt($(this).data('typecode')) === 1){
            // Danh chho thuộc tính parent
            let item = {
                value: $(this).val(),
                name: $(this).attr('data-name'),
                attributeId: $(this).attr('data-attribute'),
            }
            parentAttributeValues.push(item);
        } else {
                // Danh cho thuộc tính child
            let item = {
                value: $(this).val(),
                name: $(this).attr('data-name'),
                attributeId: $(this).attr('data-attribute'),
            }
            childAttributeValues.push(item);
        }



    });

    mapExtraData(parentAttributeValues, childAttributeValues);
}

function mapExtraData(parentAttributeValues, childAttributeValues){
    var insuranceExtraDataDeliverableItems  = [];
    var parentItem = [
        {
            id: parentCartItemId,
            attributeValues: parentAttributeValues
        }
    ]

    var childItem = [];

    childCartItemId.map(childId => {
        let item =  {
            id: childId,
            attributeValues: childAttributeValues
        }
        childItem.push(item)
    });
    insuranceExtraDataDeliverableItems = insuranceExtraDataDeliverableItems.concat(childItem, parentItem);
    var extraData = {
        insuranceExtraData_deliverableItems: insuranceExtraDataDeliverableItems
    }
    localStorage.setItem("extraData", JSON.stringify(extraData));
}

function getChildCartItemId(mainPackageBenefits, many){
    var mainCode =  mainPackageBenefits.map(x =>  x.code);
    var index = mainCode.findIndex(x => x == many.productCode);
    if (index > -1) childCartItemId.push(many.id);
}

function changeVehiclePlateStatus() {
    vehiclePlateStatusC = ['group-atc_VehiclePlateNumber'];
    vehiclePlateStatusK = ['group-atc_VehicleChassisNumber', 'group-atc_VehicleEngineNumber'];
    $('body').on('click', '.group-atc_VehiclePlateStatus .form-control-config', function () {
        var valStatus = $(this).val();
        switch (valStatus) {
            case 'C':
                vehiclePlateStatusC.map(className => {
                    $('.'+className).show();
                });
                vehiclePlateStatusK.map(className => {
                    $('.'+className).hide();
                });
                break;
            case 'K':
                vehiclePlateStatusK.map(className => {
                    $('.' + className).show();
                });
                vehiclePlateStatusC.map(className => {
                    $('.' + className).hide();
                });
                break;
            default:
                vehiclePlateStatusC.map(className => {
                    $('.' + className).show();
                });
                vehiclePlateStatusK.map(className => {
                    $('.' + className).hide();
                });
                break;
        }
    });
}

/**
 * Xử lý sự kiện khi một thuộc tính được thay đổi giá trị
 * @param {*} attributes Danh sách thuộc tính
 */
function handleFormInfoChange(attributes) {
    $(".form-control-config").on('change', function () {
        if(!attributes) return
        let arrAttributes = attributes.filter(item => item.applyConditions && item.applyConditions.length);
        let length = arrAttributes.length;
        for (let index = 0; index < length; index++) {
            if(!arrAttributes[index].applyConditions){
                return
            }
            showAttributeWithCondition(arrAttributes[index]);
        }
    });
}

// type: string, arrTypes: string[]
function checkValue(type, arrTypes) {
    let index = arrTypes.indexOf(type);
    return index > -1 ? true : false
}

/**
 * Lấy giá trị thuộc tính theo loại thuộc tính và attributeCode
 * @param {*} condition
 * @returns string || null
 */
function jqueyGetValue(condition){
    let type = condition.type;
    if(checkValue(type, types[0])){
        return $('input[name="'+condition.attributeCode+'"]:checked').val()
    }
    if(checkValue(type, types[1])){
        return $('[name="'+condition.attributeCode+'"]').val();
    }
    if(checkValue(type, types[2])){
        return $('input[name="'+condition.attributeCode+'"]').val()
    }
    if(checkValue(type, types[3])){
        return $(`select[name=${condition.attributeCode}]`).val()
    }
    return null
}

/**
 * Hiển thị thuộc tính theo điều kiện áp dụng.
 * @param {*} attribute thuộc tính
 * @returns
 */
function showAttributeWithCondition(attribute) {
    if(!attribute) {return}
    let show = false;
    let length = attribute.applyConditions.length;
    for (let index = 0; index < length; index++) {
        let attributeValues = jqueyGetValue(attribute.applyConditions[index]);
        show = showAttribute(attribute.applyConditions[index], attributeValues);
        if (!show) {
            break
        }
    }
    if(show){
        $(`.group-atc_${attribute.attributeCode}`).show();
    } else {
        $(`.group-atc_${attribute.attributeCode}`).hide();
    }
}

/**
 * Thêm trường applyConditions (danh sách điều kiện áp dụng) và từng phần tử của danh sách thuộc tính
 * @param {*} attributes
 * @returns Danh sách thuộc tính
 */
function initDataRender(attributes) {
    return attributes.map(item => {
        let applyConditions = initDataApplyConditions(attributes, item.entityAttributeUIConfig.applyConditions);
        return {
            ...item,
            applyConditions: applyConditions
        }
    })
}

/**
 * Thêm trường loại thuộc tính vào điều kiện áp dụng của thuộc tính
 * @param {*} attributes danh sách thuộc tính
 * @param {*} applyConditions Danh sách điều kiện áp dụng của thuộc tính
 * @returns Danh sách điều kiện áp dụng của thuộc tính
 */
function initDataApplyConditions(attributes, applyConditions) {
    return applyConditions.map(item => {
        let attributeType = null;
        let attribute = attributes.find(attribute => attribute.attributeCode == item.attributeCode);
        if(attribute){
            attributeType = attribute.type
        }
        return {
            ...item,
            type: attributeType
        }
    });
}

/**
 * Kiểm tra thuộc tính có được hiển thị?
 * @param {*} condition điều kiện áp dụng thuộc tính
 * @param {*} value giá trị thuộc tính nhập vào
 * @returns bool
 */
function showAttribute(condition, value) {
    if (!condition) {
        return false
    }
    let attributeValues = condition.attributeValues;
    let attrbuteType = condition.type;
    if (checkValue(attrbuteType, groupTypes[0])) {
        return applyConditionsChecking(value, attributeValues)
    }
    if (checkValue(attrbuteType, groupTypes[1])) {
        return applyConditionsCheckingTypeText(condition, value)
    }
    // if(attrbuteType == 'file'){}
    // if(attrbuteType == 'address'){}
}

/**
 * Với các thuộc tính có input là giá trị.Kiểm tra giá trị thuộc tính có thỏa điều kiện áp dụng hay không.
 * @param {*} currentAttributeValue giá trị thuộc tính nhập vào
 * @param {*} attributeEffectedValue giá trị thuộc tính trong điều kiện áp dụng
 * @returns bool
 */
function applyConditionsChecking(currentAttributeValue, attributeEffectedValue) {
    let result = false;
    if (!currentAttributeValue || !attributeEffectedValue) {
        return result
    }
    let arrAttributeValue = currentAttributeValue;
    if ((typeof currentAttributeValue) == "string") {
        arrAttributeValue = currentAttributeValue.split(',');
    }
    let resultMergeValues = [].concat(arrAttributeValue, attributeEffectedValue);
    let duplicateValue = resultMergeValues.filter((item, index) => resultMergeValues.indexOf(item) != index);
    if (duplicateValue.length) {
        result = true
    }
    return result
}

/**
 * Với các thuộc tính có input là chuỗi. Kiểm tra giá trị thuộc tính có thỏa điều kiện áp dụng hay không.
 * @param {*} condition điều kiện áp dụng thuộc tính
 * @param {*} currentAttributeValue giá trị thuộc tính nhập vào
 * @returns bool
 */
function applyConditionsCheckingTypeText(condition, currentAttributeValue){
    if(condition && (condition.conditionType == conditionType.Empty)){
        return currentAttributeValue.length === 0
    }

    if(currentAttributeValue){
        return  false;
    }

    if((condition)){
        let valueIsNumber = !isNaN(currentAttributeValue) && !isNaN(condition.contentsCondition);
        if(condition.conditionType == conditionType.NotEmpty){
            return  currentAttributeValue.length !== 0
        }
        if(condition.conditionType == conditionType.TextIncluded){
            return  currentAttributeValue.includes(condition.contentsCondition)
        }
        if(condition.conditionType == conditionType.TextNotIncluded){
            return  !currentAttributeValue.includes(condition.contentsCondition)
        }
        if(condition.conditionType == conditionType.TextStarting){
            return currentAttributeValue.startsWith(condition.contentsCondition)
        }
        if(condition.conditionType == conditionType.TextEnding){
            return currentAttributeValue.endsWith(condition.contentsCondition);
        }
        if(condition.conditionType == conditionType.TextExact){
            return  currentAttributeValue === condition.contentsCondition
        }
        if((condition.conditionType == conditionType.Equal) && valueIsNumber){
            return  Number(currentAttributeValue) == Number(condition.contentsCondition)
        }
        if((condition.conditionType == conditionType.NotEqual)  && valueIsNumber){
            return  Number(currentAttributeValue) !== Number(condition.contentsCondition)
        }
        if((condition.conditionType == conditionType.GreaterThan) && valueIsNumber){
            return Number(currentAttributeValue) > Number(condition.contentsCondition)
        }
        if((condition.conditionType == conditionType.LessThan) && valueIsNumber){
            return  Number(currentAttributeValue) < Number(condition.contentsCondition)
        }
        if((condition.conditionType == conditionType.LessThanOrEqual) && valueIsNumber){
            return  Number(currentAttributeValue) <= Number(condition.contentsCondition)
        }
        if((condition.conditionType == conditionType.GreaterThanOrEqualTo) && valueIsNumber){
            return  Number(currentAttributeValue) >= Number(condition.contentsCondition)
        }
        // if(attConditionType == conditionType.Between){
        // }
        // if(attConditionType == conditionType.NotBetween){
        // }
    }
    return false
}

/**
 *
 * @param {*} id : number
 * @param {*} name : string Giá trị trả về mặc định
 * @param {*} arr : Array object {id: number, name: string}
 * @returns name : string
 */
function getNameByIdInArray(id, name,arr) {
    var arrValue = arr;
    let index = arrValue.findIndex(item => id == item.id);
    if(index > -1){
        return arr[index].name;
    } else {
        return name;
    }
}

/**
 * Add (+/-) Button Number Incrementers
 * @param {*} elmButton : Class
 */
function numberIncrementButtons(elmButton, min, max) {

    $(elmButton).append('<div class="inc button-incrementer">+</div><div class="dec button-incrementer">-</div>');
    $(elmButton).addClass('form-group-number-incrementer');
    $(elmButton).find(".form-control").val(min);
    let _fid = $(elmButton).find(".form-control").attr('data-fid');

    let  driversSeatCapacity = 1;
    let  driversAssistantSeatCapacity = 1;
    let  passengerSeatCapacity = 0;

    $('#' + _fid).val(min);
    $('#f_DriversSeatCapacity').val(driversSeatCapacity);
    $('#f_DriversAssistantSeatCapacity').val(driversAssistantSeatCapacity);
    $('#f_PassengerSeatCapacity').val(passengerSeatCapacity);


    $(elmButton + " .button-incrementer").on("click", function () {

        let $button = $(this);
        let oldValue = $(elmButton).find(".form-control").val();
        let newVal;
        if ($button.text() == "+") {
            if (oldValue < max) {
                newVal = parseFloat(oldValue) + 1;
            } else {
                newVal = max;
            }
        } else {
            // Don't allow decrementing below zero
            if (oldValue > min) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = min;
            }
        }
        passengerSeatCapacity = parseInt(newVal) - driversSeatCapacity - driversAssistantSeatCapacity;
        $('#' + _fid).val(newVal);
        $('#f_PassengerSeatCapacity').val(passengerSeatCapacity);
        $(elmButton).find(".form-control").val(newVal);
        $('.btn-choose-insur').hide();
        $('.btn-calculator').fadeIn();
    });

    $('[name="SeatCapacity"]').change(function () {
        let numSeatCapacity = $(this).val();
        
        if (numSeatCapacity < min){
            $(this).val(min);
        }
        if (numSeatCapacity > max){
            $(this).val(max);
        }
        let newVal = $(this).val();
        passengerSeatCapacity = parseInt(newVal) - driversSeatCapacity - driversAssistantSeatCapacity;
        $('#f_PassengerSeatCapacity').val(passengerSeatCapacity);
    });
}


/**
 * Xử lý api lấy thông tin từ bên 4banh hổ trợ thông tin
 * @param {*} $status : Trạng thái áp dụng lấy thông tin xe từ 4banh
 */


var model, marker;
function progressCarInsuranceProduct($status) {
    if ($status == true){
        carProductMakers();
        clearDataCarInsurance();
        maxCarYearOfUsing = 10;
        $('[name="CarCompany"]').select2();
        $('[name="CarBrand"]').select2();


        // Fetch the preselected item, and add to the control
        var carCompanySelect = $('[name="CarCompany"]');
        carCompanySelect.on('select2:selecting', onSelectingMarker);
        var carBrandSelect = $('[name="CarBrand"]');
        carBrandSelect.on('select2:selecting', onSelectingCarCompany);
    }
}

function carProductMakers() {
    let base_url = $("#data-product-insur").data('baseurl');
    var ajaxReq = $.ajax({
        url: base_url + 'api/v1/car-product/makers',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function () {
            clearDataCarInsurance();
        },
        complete: function () {

        },
        success: function (res) {
            if (res.data.length > 0){
                $('[name="CarCompany"]').html('<option selected value="null">Chọn giá trị</option>');
                $('[name="CarBrand"]').html('<option selected value="null">Chọn giá trị</option>');
                res.data.map(item => {
                    let option = '<option value="' + item.maker_key + '">' + item.maker +'</option>'
                    $('[name="CarCompany"]').append(option);
                });


            }
        }
    });


}

function onSelectingMarker(event) {
    marker = '';
    marker = event.params.args.data.id;
    $('.btn-choose-insur').hide();
    $('.btn-calculator').fadeIn();
    carProductModelByMarker(marker);
}

function carProductModelByMarker(marker) {
    let base_url = $("#data-product-insur").data('baseurl');
    var ajaxReq = $.ajax({
			url: base_url + "api/v1/car-product/models?makerKey=" + marker,
			type: "GET",
			dataType: "JSON",
			beforeSend: function () {
				$('[name="CarBrand"]').html('<option selected value="null">Chọn giá trị</option>');
				$('[name="CarBrand"]').val("");
				clearDataCarInsurance();
			},
			complete: function () {},
			success: function (res) {
				if (res.data.length > 0) {
					res.data.map((item) => {
						let option = '<option value="' + item.model + '">' + item.model + "</option>";
						$('[name="CarBrand"]').append(option);
					});
				}
			},
		});

}


function onSelectingCarCompany(event) {
    model = '';
    model = event.params.args.data.id;
    $('.btn-choose-insur').hide();
    $('.btn-calculator').fadeIn();
    getCarProduct();

}


function getCarProduct() {
    let base_url = $("#data-product-insur").data('baseurl');
    let body = {
        makerKey: encodeURIComponent(marker),
        model: encodeURIComponent(model),
    };
    var ajaxReq = $.ajax({
        url: base_url + 'api/v1/car-product',
        type: 'GET',
        dataType: 'JSON',
        data: body,
        beforeSend: function () {
            clearDataCarInsurance();
        },
        complete: function () {

        },
        success: function (res) {
            if (res.data && res.data.items.length > 0){
                let carInfo = res.data.items[0];
                let currentYear = (new Date()).getFullYear();
                let carYearOfUsing = currentYear - parseInt(carInfo.year_of_production);
                // maxCarYearOfUsing
               
               
                $('[name="SeatCapacity"]').val(carInfo.num_of_seat).attr('data-value', carInfo.num_of_seat);
                $('[name="CarYearOfProduction"]').val(carInfo.year_of_production).attr('data-value', carInfo.year_of_production);
                $('[name="CarYearOfUsing"]').val(carYearOfUsing).attr('data-value', carYearOfUsing);
                $('[name="CarValue"]').val(carInfo.cost).attr('data-value', carInfo.cost);
                $('[name="CarMaxInsuranceAmount"]').val(carInfo.cost).attr('data-value', carInfo.cost);
                if (carYearOfUsing > maxCarYearOfUsing) {
                    toastr.error('Sản phẩm bảo hiểm này không hổ trợ cho xe trên ' + maxCarYearOfUsing + ' năm!');
                    return false;
                }

                $('[name="CarValue"]').maskMoney('mask', parseInt(carInfo.cost));

                $('[name="CarMaxInsuranceAmount"]').maskMoney('mask', parseInt(carInfo.cost));

                pushDataCarInsurance();
            }   else {
               clearDataCarInsurance();
            }
        }
    });

}


function clearDataCarInsurance() {
    let arrInput = ['SeatCapacity', 'CarYearOfProduction', 'CarYearOfUsing', 'CarValue', 'CarMaxInsuranceAmount'];
    $('[name="SeatCapacity"]').val('').prop('disabled', true).attr('data-value', '');
    $('[name="CarYearOfProduction"]').val('').prop('disabled', true).attr('data-value', '');
    $('[name="CarYearOfUsing"]').val('').prop('disabled', true).attr('data-value', '');
    $('[name="CarValue"]').val('').prop('disabled', true).attr('data-value', '');
    

    arrInput.forEach(x => {
        $('[name="' + x + '"]').val('').prop('disabled', true);
        $('[name="f_' + x + '"]').val('');
    });
    $('[name="CarMaxInsuranceAmount"]').val('').prop('disabled', false).attr('data-value', '');
    $('[name="f_CarCompany"]').val('');
    $('[name="f_CarBrand"]').val('');

}

function pushDataCarInsurance(){
    let arrInput = ['CarCompany', 'CarBrand', 'SeatCapacity', 'CarYearOfProduction', 'CarYearOfUsing', 'CarValue', 'CarMaxInsuranceAmount'];
    arrInput.forEach(x => {
        let _val = $('[name="' + x + '"]').val();
        let dataMask = $('[name="' + x + '"]').attr('data-mask');
        if (dataMask == 'currency'){
            $('[name="f_' + x + '"]').val($('[name="' + x + '"]').maskMoney('unmasked')[0]*1000);
            
        } else {
            $('[name="f_' + x + '"]').val(_val);
        }
    });
}

function validationFeeCarDamage(){
    let isvalid = true;
    if (template_code == 'insur_physical_damage'){
        let carPrice = $('[name="CarValue"]').maskMoney('unmasked')[0];
        let carMaxInsuranceAmount = $('[name="CarMaxInsuranceAmount"]').maskMoney('unmasked')[0];
        let carYearOfUsing = $('[name="CarYearOfUsing"]').val();
        if (carPrice * 0.95 > carMaxInsuranceAmount  || carPrice * 1.05 < carMaxInsuranceAmount ) {
            toastr.error('Số tiền yêu cầu bảo hiểm không được chênh lệch quá 5% giá trị xe!');
            isvalid = false;
        }
        if (carYearOfUsing > maxCarYearOfUsing) {
            toastr.error('Sản phẩm bảo hiểm này không hổ trợ cho xe trên ' + maxCarYearOfUsing + ' năm!');
            isvalid = false;
        }
    }
    return isvalid; 
}


function validationCar() {
    let isvalid = true;
    if (template_code == 'insur_car') {
        if ($('input[name="NNTXOTO"]').is(':checked')) {
            let valTotalInsuranceAmount = $('[name="TotalInsuranceAmount"]').maskMoney('unmasked')[0];
            let min = 10000000;
            let max = 950000000;
            if (parseInt(valTotalInsuranceAmount) <= 0){
                toastr.error('Vui lòng nhập số tiền bảo hiểm Lái, Phụ xe và NNTX');
                isvalid = false;
            } 
            if (parseInt(valTotalInsuranceAmount * 1000) < min && parseInt(valTotalInsuranceAmount) > 0){
                toastr.error('Số tiền bảo hiểm Lái, Phụ xe và NNTX thấp nhất: 10,000,000 đ');
                isvalid = false;
            } 
            
            if (parseInt(valTotalInsuranceAmount * 1000) > max){
                toastr.error('Số tiền bảo hiểm Lái, Phụ xe và NNTX cao nhất: 950,000,000 đ');
                isvalid = false;
            } 

        }

        let f_CarType = $('#f_CarType').val();
        let f_SeatCapacity = $('#f_SeatCapacity').val();
        if (f_CarType == 'K_02' && f_SeatCapacity > 5){
            toastr.error('Không hỗ trợ xe vừa chở người, vừa chở hàng (Pickup) có số chỗ đăng ký theo xe lớn hơn 5.');
            isvalid = false;
        }
    }
    return isvalid;
}

function copyInsuranceInfomation(){
    $('.btn-copyinsurance').on('click', function () {
        let groupID = $(this).attr('data-groupid');
        let objDataInfoInsurace = [
            {
                from: 'ContractOwnerName',
                to: 'HumanObjectsName',
                groupID: 3
            },
            {
                from: 'ContractOwnerPhoneNumber',
                to: 'HumanObjectsPhoneNumber',
                groupID: 3
            },
            {
                from: 'ContractOwnerIdentityNumber',
                to: 'IdentityNumber',
                groupID: 3
            },
            {
                from: 'ContractOwnerEmail',
                to: 'HumanObjectsEmail',
                groupID: 3
            },
            {
                from: 'ContractOwnerAddress',
                to: 'Address',
                groupID: 3
            },
            {
                from: 'ContractOwnerName',
                to: 'CarOwnerName',
                groupID: 3
            },
            {
                from: 'ContractOwnerPhoneNumber',
                to: 'CarOwnerPhoneNumber',
                groupID: 3
            },
            {
                from: 'ContractOwnerEmail',
                to: 'CarOwnerEmail',
                groupID: 3
            },
            {
                from: 'ContractOwnerAddress',
                to: 'OwnerAddress',
                groupID: 3
            },
            {
                from: 'ContractOwnerName',
                to: 'CarOwnerName',
                groupID: 4
            },
            {
                from: 'ContractOwnerPhoneNumber',
                to: 'CarOwnerPhoneNumber',
                groupID: 4
            },
            {
                from: 'ContractOwnerEmail',
                to: 'CarOwnerEmail',
                groupID: 4
            },
            {
                from: 'ContractOwnerAddress',
                to: 'OwnerAddress',
                groupID: 4
            },
            {
                from: 'ContractOwnerName',
                to: 'CarBeneficiary',
                groupID: 5
            },
            {
                from: 'ContractOwnerAddress',
                to: 'CarBeneficiariesAddress',
                groupID: 5
            },
        ];

        objDataInfoInsurace.map(item => {
            if (groupID == item.groupID){
                $('[name="' + item.to + '"]').val($('[name="' + item.from + '"]').val());
            }
        });

        if (template_code == 'insur_health'){
            $('[name="FamilyRelationship"]').val('Bản thân');
        }
    })
}