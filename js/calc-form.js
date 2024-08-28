jQuery(function () {
    if ($('html').is(':lang(uk)')) {
        $seaText = 'Море - Контейнер20\':';
        $seaText40 = ', Контейнер40\':';
        $trainText = 'ЖД - Контейнер20\':';
        $trainText40 = ', Контейнер40\':';
        $aviaText = 'Авіа - ';
    } else if ($('html').is(':lang(ru-RU)')) {
        $seaText = 'Море - Контейнер20\':';
        $seaText40 = ', Контейнер40\':';
        $trainText = 'ЖД - Контейнер20\':';
        $trainText40 = ', Контейнер40\':';
        $aviaText = 'Авиа - ';
    } else if ($('html').is(':lang(en_US)')) {
        $seaText = 'Sea - Container20\':';
        $seaText40 = ', Container40\':';
        $trainText = 'Train - Container20\':';
        $trainText40 = ', Container40\':';
        $aviaText = 'Avia - ';
    } else {
        $seaText = 'Sea - Container20\':';
        $seaText40 = ', Container40\':';
        $trainText = 'Train - Container20\':';
        $trainText40 = ', Container40\':';
        $aviaText = 'Avia - ';
    }

    $calcToggler = $('.calc-toggler');
    $calcOpeningCol = $('.calc-opening-col');
    $calcSelect = $('.calculation-select');

    const selectFrom = document.getElementById('country-from')
    const selectTo = document.getElementById('country-to')

    selectFrom.addEventListener('change', onSelectFromChange)
    selectTo.addEventListener('change', onSelectToChange)

    formReset()

    function onSelectFromChange(e) {
        hiddenInputsReset()
        const option = e.target.options[e.target.selectedIndex]
        data = option.getAttribute("data-destinations")
        populateDestinationsSelector(data)
        if (isCountryFromIsTransporting()) { // Transporting types
            showTransportingBlocks()
            transportingSectionPopulateAttr()
            transportingUpdatePrices()
            transportingDeliveryInfoUpdate()
        }

        if (!isCountryFromIsTransporting()) { // Donwloading types
            showDownloadingBlocks()
            downloadingSectionPopulateAttr()
            downloadingUpdatePrices()
            downloadingDeliveryInfoUpdate()
        }

        hiddenInputPopulateAttr()

        const selectorDestination = new SelectorDestination()
        selectorDestination.placeholderActivate()
        formHide()
    }

    function onSelectToChange(e) {
        formShow()
        if (isCountryFromIsTransporting()) { // Transporting types
            showTransportingBlocks()
            transportingSectionPopulateAttr()
            transportingUpdatePrices()
            transportingDeliveryInfoUpdate()
        }

        if (!isCountryFromIsTransporting()) { // Donwloading types
            showDownloadingBlocks()
            downloadingSectionPopulateAttr()
            downloadingUpdatePrices()
            downloadingDeliveryInfoUpdate()
        }

        hiddenInputPopulateAttr()
    }

    // Downloading checkboxes
    // Box Type
    $('.downloading-types-checkbox li').on('click', function (e) {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        if ($(this).hasClass('type-palete')) {
            $('.delivery-add-text').removeClass('active');
            $('.delivery-add-text.palete-text').addClass('active');
        } else if ($(this).hasClass('type-box')) {
            $('.delivery-add-text').removeClass('active');
            $('.delivery-add-text.box-text').addClass('active');
        } else {
            $('.delivery-add-text').removeClass('active');
            $('.delivery-add-text.ftl-text').addClass('active');
        };
        downloadingUpdatePrices()
        hiddenInputPopulateAttr()
    });

    // Transport Type
    $('.downloading-ways-checkbox li').on('click', function (e) {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        if ($(this).hasClass('sea')) {
            $('.transporting-types-prices >div').removeClass('active');
            $('.transporting-types-prices .sea').addClass('active');
        } else if ($(this).hasClass('train')) {
            $('.transporting-types-prices >div').removeClass('active');
            $('.transporting-types-prices .train').addClass('active');
        } else {
            $('.transporting-types-prices >div').removeClass('active');
            $('.transporting-types-prices .avia').addClass('active');
        }

        hiddenInputPopulateAttr()
    });

    // Transporting checkboxes
    $('.transporting-types-checkbox li').on('click', function (e) {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    });

    // Business type
    $(document).ready(function () {
        $activeBusinessType = $('.checkbox-business-type li.active').html();
        $('#bussiness-type').attr('value', $activeBusinessType);
    });

    $('.checkbox-business-type li').on('click', function (e) {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        hiddenInputPopulateAttr()
    });

    /**
     * Populating destination selector with options(countries)
     * @param {string} destinationsData
     */
    function populateDestinationsSelector(destinationsData) {
        clearDestinationSelect()
        const parser = new Parser()
        parser.parse(destinationsData)
        const countries = parser.getDestinations()
        Array.from(countries).forEach(country => {
            $(selectTo).append($('<option class="location-to" data-capital="' + country.Capital + '" data-box="' + country.Box + '" ' +
                'data-palet="' + country.Palet + '" data-ftl="' + country.Ftl + '" data-train20="' + country.Train20 + '" data-train40="' + country.Train40 + '" ' +
                'data-train1m3="' + country.Train1m3 + '" data-avia="' + country.Avia + '" data-sea20="' + country.Sea20 + '" ' + 'data-id="'+country.Id+'"' +
                'data-sea40="' + country.Sea40 + '" data-sea1m3="' + country.Sea1m3 + '" value="' + country.Country + '">' + country.Country + '</option>'));
        })
    }

    /**
     * Find selected option from countriesTo selector
     * @returns {HTMLOptionElement}
     */
    function findSelectedDestination() {
        let destSelected = $("#country-to option:selected")
        if (destSelected.length == 0) {
            destSelected = $("#country-to option").next()
        }

        return destSelected
    }

    function formShow() {
        $calcOpeningCol.slideDown({ "opacity": "show", bottom: "100" }, 300);
        $calcToggler.css('opacity', '1');
    }

    function formHide() {
        $calcOpeningCol[0].style.display = "none"
    }

    function formReset() {
        const selectorFrom = new FromSelector()
        const currentFromDefaultOption = selectorFrom.setCurrentCountry()
        if (!currentFromDefaultOption) {
            hiddenInputsReset()
            return
        }
        data = currentFromDefaultOption.getAttribute("data-destinations")
        populateDestinationsSelector(data)
        hiddenInputPopulateAttr()

        const selectorDestination = new SelectorDestination()
        if (selectorDestination.findDefaultCountryId() == 0) {
            hiddenInputsReset()
            selectorDestination.placeholderActivate()
            formHide()
        }

        if (selectorDestination.findDefaultCountryId() > 0) {
            selectorDestination.setCurrentCountry()
            if (isCountryFromIsTransporting()) { // Transporting types
                showTransportingBlocks()
                transportingSectionPopulateAttr()
                transportingUpdatePrices()
                transportingDeliveryInfoUpdate()
            }

            if (!isCountryFromIsTransporting()) { // Donwloading types
                showDownloadingBlocks()
                downloadingSectionPopulateAttr()
                downloadingUpdatePrices()
                downloadingDeliveryInfoUpdate()
            }
            formShow()
        }
    }

    function hiddenInputsReset() {
        document.querySelector('#country-from-input').value = ""
        document.querySelector('#country-to-input').value = ""
        document.querySelector('#delivery-way-input').value = ""
        document.querySelector('#delivery-type-input').value = ""
        document.querySelector('#delivery-cost-input').value = ""
        document.querySelector('#bussiness-type').value = ""
        document.querySelector('#delivery-price').value = ""
    }

    function downloadingSectionPopulateAttr() {
        const destSelected = findSelectedDestination()
        const palleteButton = document.querySelector(".type-palete")
        palleteButton.setAttribute("data-price", destSelected.attr("data-palet"))

        const boxesButton = document.querySelector(".type-box")
        boxesButton.setAttribute("data-price", destSelected.attr("data-box"))

        const ftlButton = document.querySelector(".type-ftl")
        ftlButton.setAttribute("data-price", destSelected.attr("data-ftl"))
    }

    function transportingSectionPopulateAttr() {
        const destSelected = findSelectedDestination()
        const seaButton = document.querySelector(".sea")
        seaButton.setAttribute("data-price-sea20", destSelected.attr("data-sea20"))
        seaButton.setAttribute("data-price-sea40", destSelected.attr("data-sea40"))
        seaButton.setAttribute("data-price-sea1m3", destSelected.attr("data-sea1m3"))

        const aviaButton = document.querySelector(".avia")
        aviaButton.setAttribute("data-price-avia", destSelected.attr("data-avia"))

        const trainButton = document.querySelector(".train")
        trainButton.setAttribute("data-price-train20", destSelected.attr("data-train20"))
        trainButton.setAttribute("data-price-train40", destSelected.attr("data-train40"))
        trainButton.setAttribute("data-price-train1m3", destSelected.attr("data-train1m3"))
    }

    function transportingUpdatePrices() {
        const destSelected = findSelectedDestination()
        const prices = document.querySelector(".transporting-types-prices")

        const seaContainer20Price = prices.querySelector(".sea .cont-20 .delivery-cost")
        seaContainer20Price.innerText = destSelected.attr("data-sea20")
        const seaContainer40Price = prices.querySelector(".sea .cont-40 .delivery-cost")
        seaContainer40Price.innerText = destSelected.attr("data-sea40")
        const seaContainer1m3Price = prices.querySelector(".sea .lcm-1m3 .delivery-cost")
        seaContainer1m3Price.innerText = destSelected.attr("data-sea1m3")

        const trainContainer20Price = prices.querySelector(".train .cont-20 .delivery-cost")
        trainContainer20Price.innerText = destSelected.attr("data-train20")
        const trainContainer40Price = prices.querySelector(".train .cont-40 .delivery-cost")
        trainContainer40Price.innerText = destSelected.attr("data-train40")
        const trainContainer1m3Price = prices.querySelector(".train .lcm-1m3 .delivery-cost")
        trainContainer1m3Price.innerText = destSelected.attr("data-train1m3")

        const aviaPrice = prices.querySelector(".avia .delivery-cost")
        aviaPrice.innerText = destSelected.attr("data-avia")
    }

    function downloadingUpdatePrices() {
        const prices = document.querySelector(".downloading-types-prices")
        const buttonActive = document.querySelector('.downloading-types-checkbox .active')

        const cost = prices.querySelector('.delivery-cost')
        cost.innerText = buttonActive.getAttribute("data-price")
    }

    function downloadingDeliveryInfoUpdate() {
        const delivery = document.querySelector(".delivery-note-wrap")
        delivery.style.display = "block"
        delivery.querySelector(".country-from-text").innerText = findCurrentCapitalCountryFrom()
        delivery.querySelector(".country-to-text").innerText = findCurrentCapitalCountroTo()
        delivery.querySelector(".palete-text").classList.add("active")
    }

    function transportingDeliveryInfoUpdate() {
        const delivery = document.querySelector(".delivery-note-wrap")
        delivery.style.display = "block"
        delivery.querySelector(".country-from-text").innerText = findCurrentCapitalCountryFrom()
        delivery.querySelector(".country-to-text").innerText = findCurrentCapitalCountroTo()
        if (delivery.querySelector(".delivery-add-text.active")) {
            delivery.querySelector(".delivery-add-text.active").classList.remove('active')
        }
    }

    function inputHiddenTransportingDeliveryTypeUpdate() {
        const wrapper = document.querySelector(".downloading-ways-wrap")
        const active = wrapper.querySelector(".list-item.active")
        if (!active) return
        const type = active.getAttribute("data-way")
        document.querySelector("#delivery-way-input").setAttribute("value", type)
        document.querySelector("#delivery-type-input").setAttribute("value", "")
    }

    function inputHiddenDownloadingDeliveryTypeUpdate() {
        const wrapper = document.querySelector(".downloading-types-wrap")
        const active = wrapper.querySelector(".list-item.active")
        if (!active) return
        const type = active.getAttribute("data-type")
        document.querySelector("#delivery-type-input").setAttribute("value", type)
        document.querySelector("#delivery-way-input").setAttribute("value", "")
    }

    function hiddenInputPopulateAttr() {
        const destSelected = findSelectedDestination()
        const fromSelected = findSelectedOptionFrom()
        const countryToName = destSelected.attr("value")
        const countryTo = document.getElementById('country-to-input')
        countryTo.setAttribute("value", countryToName)
        document.querySelector("#country-from-input").setAttribute("value", fromSelected.getAttribute("value"))

        if (isCountryFromIsTransporting()) {
            inputHiddenTransportingDeliveryTypeUpdate()
        }

        if (!isCountryFromIsTransporting()) {
            inputHiddenDownloadingDeliveryTypeUpdate()
            const price = findCurrentDownloadingType()
            document.querySelector("#delivery-price").setAttribute("value", price.getAttribute("data-price"))
        }

        const deliveryCost = getDeliveryCost()
        document.querySelector("#delivery-cost-input").setAttribute("value", deliveryCost)

        document.querySelector("#bussiness-type").setAttribute("value", getBusinessType())
    }

    function clearDestinationSelect() {
        $(selectTo).find('option:not([disabled])').remove();
    }

    function findSelectedOptionFrom() {
        const selectedIndex = selectFrom.selectedIndex;
        const options = selectFrom.options
        const selected = options[selectedIndex]
        return selected
    }

    function isCountryFromIsTransporting() {
        const selected = findSelectedOptionFrom()
        return selected.getAttribute("data-transporting") == "yes"
    }

    function showTransportingBlocks() {
        $('.downloading-types-wrap').css('display', 'none');
        $('.downloading-ways-wrap').css('display', 'block');
        $('.downloading-types-prices').css('display', 'none');
        $('.transporting-types-prices').css('display', 'block');
    }

    function showDownloadingBlocks() {
        $('.downloading-types-wrap').css('display', 'block');
        $('.downloading-ways-wrap').css('display', 'none');
        $('.downloading-types-prices').css('display', 'block');
        $('.transporting-types-prices').css('display', 'none');
    }

    /**
     * @returns {string}
     */
    function findCurrentCapitalCountryFrom() {
        const selected = findSelectedOptionFrom()
        return selected.getAttribute("data-capital")
    }

    function findCurrentCapitalCountroTo() {
        const selected = findSelectedDestination()
        return selected[0].getAttribute("data-capital")
    }

    function findCurrentDownloadingType() {
        return document.querySelector(".downloading-types.active")
    }

    function findCurrentTransportingType() {
        return document.querySelector(".downloading-ways.active")
    }

    /**
     * @returns {string}
     */
    function getDeliveryCost() {
        let result = ""
        if (isCountryFromIsTransporting()) {
            const active = findCurrentTransportingType()
            if (active) {
                result += active.getAttribute("data-way")
                result += " - "
                if (active.classList.contains("avia")) {
                    result += active.getAttribute("data-price-avia")
                }

                if (active.classList.contains("sea")) {
                    result += "Cont 20: " + active.getAttribute("data-price-sea20")
                    result += ", "
                    result += "Cont 40: " + active.getAttribute("data-price-sea40")
                    result += ", "
                    result += "LCL 1м3: " + active.getAttribute("data-price-sea1m3")
                }

                if (active.classList.contains("train")) {
                    result += "Cont 20: " + active.getAttribute("data-price-train20")
                    result += ", "
                    result += "Cont 40: " + active.getAttribute("data-price-train40")
                    result += ", "
                    result += "LCL 1м3: " + active.getAttribute("data-price-train1m3")
                }
            }
        }

        if (!isCountryFromIsTransporting()) {
            const active = findCurrentDownloadingType()
            if (active) {
                result += active.getAttribute("data-type")
                result += " - "
                result += active.getAttribute("data-price")
            }
        }

        return result
    }

    /**
     * @returns {string}
     */
    function getBusinessType() {
        const node = document.querySelector(".checkbox-business-type .active")
        return node.innerText
    }
});

/**
 * Parse countries from string
 */
class Parser {
    constructor() {
        this.countries = []
        this.countryDelim = ";;"
    }

    /**
     * @returns {Destination[]}
     */
    getDestinations() {
        return this.countries
    }

    parse(raw) {
        const c = raw.split(this.countryDelim)
        Array.from(c).forEach(el => {
            if (el != "") {
                const dest = new Destination(el)
                this.countries.push(dest)
            }
        })
    }
}

/**
 * Representation of parsed country
 */
class Destination {
    constructor(raw) {
        this.attrDelim = ",,"
        this.attrValDelim = "-"
        this.countryDelim = ":"
        this.parse(raw)
    }

    get Capital() {
        return this.capital
    }

    set Capital(str) {
        this.capital = str
    }

    get Country() {
        return this.country
    }

    get Box() {
        return this.box
    }

    set Box(val) {
        this.box = val
    }

    get Palet() {
        return this.palet
    }

    set Palet(val) {
        this.palet = val
    }

    get Ftl() {
        return this.ftl
    }

    set Ftl(val) {
        this.ftl = val
    }

    get Train20() {
        return this.train20
    }

    set Train20(val) {
        this.train20 = val
    }

    get Train40() {
        return this.train40
    }

    set Train40(val) {
        this.train40 = val
    }

    get Train1m3() {
        return this.train1m3
    }

    set Train1m3(val) {
        this.train1m3 = val
    }

    get Avia() {
        return this.avia
    }

    set Avia(val) {
        this.avia = val
    }

    get Sea20() {
        return this.sea20
    }

    set Sea20(val) {
        this.sea20 = val
    }

    get Sea40() {
        return this.sea40
    }

    set Sea40(val) {
        this.sea40 = val
    }

    get Sea1m3() {
        return this.sea1m3
    }

    set Sea1m3(val) {
        this.sea1m3 = val
    }

    get Id() {
        return this.id
    }

    set Id(val) {
        this.id = val
    }

    parse(raw) {
        const a = raw.trim().split(this.attrDelim)
        Array.from(a).forEach(el => {
            const country = el.split(this.countryDelim)
            if (country.length == 2) {
                this.parseCountries(el)
                return
            }

            const attr = el.split(this.attrValDelim)
            this.parseAtrr(attr)
        })
    }

    parseCountries(items) {
        if (items.length == 0) return
        const c = items.split(this.countryDelim)
        if (c.length <= 1) return
        const name = c[0]
        const capital = c[1]
        this.country = name
        this.capital = capital.trim().split("capital-")[1]
    }

    parseAtrr(attr) {
        const name = attr[0].trim()
        const value = attr[1]
        if (name == "box") {
            this.box = value
        }
        if (name == "palet") {
            this.palet = value
        }
        if (name == "ftl") {
            this.ftl = value
        }
        if (name == "train20") {
            this.train20 = value
        }
        if (name == "train40") {
            this.train40 = value
        }
        if (name == "train1m3") {
            this.train1m3 = value
        }
        if (name == "avia") {
            this.avia = value
        }
        if (name == "sea20") {
            this.sea20 = value
        }
        if (name == "sea40") {
            this.sea40 = value
        }
        if (name == "sea1m3") {
            this.sea1m3 = value
        }
        if (name == "id") {
            this.id = value
        }
    }
}

class FromSelector {
    constructor() {
        this.node = document.getElementById('country-from')
    }

    /**
     * @return {number}
     */
    findDefaultCountryId() {
        return this.node.getAttribute("data-default-country")
    }

    setCurrentCountry() {
        const id = this.findDefaultCountryId()
        const options = this.node.getElementsByTagName("option")
        const found = Array.from(options).find(option => option.getAttribute("data-id") === id)

        if (!found) return null

        const selectedIndex = found.index

        options[selectedIndex].selected = true

        return options[selectedIndex]
    }

    getOptions() {
        return this.node.getElementsByTagName('option')
    }
}

class SelectorDestination {
    constructor() {
        this.node = document.getElementById('country-to')
    }

    /**
     * @return {number}
     */
    findDefaultCountryId() {
        return this.node.getAttribute("data-default-country")
    }

    setCurrentCountry() {
        const id = this.findDefaultCountryId()
        const options = this.node.getElementsByTagName("option")
        const found = Array.from(options).find(option => option.getAttribute("data-id") === id)

        if (!found) {
            return null
        }

        const selectedIndex = found.index
        options[selectedIndex].selected = true
        return options[selectedIndex]
    }

    setActiveFirstAvaialableCountry() {
        const options = this.node.getElementsByTagName("option")
        if (options.length >= 1) {
            options[1].selected = true
        }
    }

    placeholderActivate() {
        const options = this.node.getElementsByTagName("option")
        options[0].selected = true

        return options[0]
    }
}