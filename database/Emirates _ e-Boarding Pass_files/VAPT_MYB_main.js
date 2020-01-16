
//RBA:TMX Script rendering
function loadRBATMX(rbaTmxEndpoint, sessionID, orgID, pageID) {
    try {
        if (rbaTmxEndpoint != undefined) {
            var rbaendpoint = rbaTmxEndpoint + '?org_id=' + orgID + '&page_id=' + pageID + '&session_id=' + sessionID;
            var filteredUrl = rbaTmxEndpoint.replace('.js', '');

            var schead = document.createElement('script');
            schead.setAttribute('type', 'text/javascript');
            schead.setAttribute('src', rbaendpoint);
            schead.setAttribute('id', 'scriptRBA');
            document.head.appendChild(schead);

            rbaendpoint = filteredUrl + '?org_id=' + orgID + '&page_id=' + pageID + '&session_id=' + sessionID;
            var ifrmRBA = document.createElement("iframe");
            ifrmRBA.setAttribute("style", "width: 100px; height: 100px; border: 0; position: absolute; top: -5000px")
            ifrmRBA.setAttribute('id', 'iframeRBA');
            ifrmRBA.setAttribute("src", rbaendpoint);
            var nosc = document.createElement('noscript');
            nosc.appendChild(ifrmRBA);
            document.body.appendChild(nosc);
        }
    }
    catch (e) { console.log(e); }
}

function showDefault(str) {
    var obj = MM_findObj('ctl00_c_payWithMiles');
    var obj1 = MM_findObj('ctl00_c_payWithCash');
    if (str == 'on') {
        if (obj != null && obj.checked == true) {
            payCashorMiles('ctl00_c_payWithMiles');
        }
        else if (obj1 != null && obj1.checked == true) {
            payCashorMiles('ctl00_c_payWithCash');
        }
    }
}

function CaptureClientEventTeaLeaf(str) {
    if ((typeof TeaLeaf != "undefined") && (typeof TeaLeaf.Client != "undefined") && (typeof TeaLeaf.Client.tlAddEvent != "undefined")) {
        var clientValidation = { ErrorMessage: str };
        var subtype = "CustomErrorMsg";
        TeaLeaf.Event.tlAddCustomEvent(subtype, clientValidation);
    }
}

function payCashorMiles(objID) {
    var obj = MM_findObj(objID);
    if (obj != null) {
        var objHdnPayByMiles = MM_findObj('ctl00_c_hdnPayByMiles');
        var objHdnPayByCash = MM_findObj('ctl00_c_hdnPayByCash');
        var objHdnChkPosTaxBrkDown = MM_findObj('ctl00_c_hdnChkPosTaxBrkDown');

        var obj1 = MM_findObj('ctl00_c_CtrlCharges_thFuelSurcharge');
        var obj2 = MM_findObj('ctl00_c_CtrlCharges_tdFuelSurcharge');
        var obj3 = MM_findObj('ctl00_c_CtrlCharges_thFuelSurchargeMiles');
        var obj4 = MM_findObj('ctl00_c_CtrlCharges_tdFuelSurchargeMiles');
        var obj19 = MM_findObj('ctl00_c_CtrlCharges_thcostFare');
        var obj20 = MM_findObj('ctl00_c_CtrlCharges_thcostMiles');
        var obj21 = MM_findObj('ctl00_c_CtrlCharges_tdtotFare');
        var obj22 = MM_findObj('ctl00_c_CtrlCharges_tdtotFareMiles');
        var obj5 = MM_findObj('ctl00_c_td_SR_CC');
        var obj6 = MM_findObj('ctl00_c_td_SR_CC_Miles');
        var obj7 = MM_findObj('ctl00_c_td_SR_TB');
        var obj8 = MM_findObj('ctl00_c_td_SR_TB_Miles');
        var obj23 = MM_findObj('ctl00_c_tdTotFare');
        var obj24 = MM_findObj('ctl00_c_tdTotMiles');
        var obj9 = MM_findObj('ctl01_fareRow2');
        var obj10 = MM_findObj('ctl01_fareRow3');
        var obj11 = MM_findObj('ctl01_fareRow6');
        var obj12 = MM_findObj('ctl01_fareRow7');
        var obj13 = MM_findObj('ctl01_fareRow9');
        var obj14 = MM_findObj('ctl01_fareRow10');
        var obj15 = MM_findObj('ctl01_divGrandTotalfare');
        var obj16 = MM_findObj('ctl01_divGrandTotalfareMiles');
        var obj17 = MM_findObj('ctl00_c_CtrlFlights_ctl00_divFareHeaderCash');
        var obj18 = MM_findObj('ctl00_c_CtrlFlights_ctl00_divFareHeaderMiles');
        var obj17_1 = MM_findObj('ctl00_c_CtrlFlights_ctl01_divFareHeaderCash');
        var obj18_1 = MM_findObj('ctl00_c_CtrlFlights_ctl01_divFareHeaderMiles');
        var obj25 = MM_findObj('ctl00_c_tdpayWithCash');
        var obj26 = MM_findObj('ctl00_c_tdpayWithMiles');

        if (obj.checked == true && objID == 'ctl00_c_payWithMiles') {

            if (objHdnPayByMiles != null && objHdnPayByCash != null) {
                document.getElementById('ctl00_c_hdnPayByMiles').value = 'true';
                document.getElementById('ctl00_c_hdnPayByCash').value = 'false';
            }
            if (obj1 != null) {
                obj1.style.visibility = 'hidden';
                obj1.style.display = 'none';
            }
            if (obj2 != null) {
                obj2.style.visibility = 'hidden';
                obj2.style.display = 'none';
            }
            if (obj3 != null) {
                obj3.style.visibility = 'visible';
                obj3.style.display = 'table-cell';
            }
            if (obj4 != null) {
                obj4.style.visibility = 'visible';
                obj4.style.display = 'table-cell';
            }
            if (obj5 != null) {
                obj5.style.visibility = 'hidden';
                obj5.style.display = 'none';
            }
            if (obj6 != null) {
                obj6.style.visibility = 'visible';
                obj6.style.display = 'table-cell';
            }
            if (obj7 != null && objHdnChkPosTaxBrkDown != null && objHdnChkPosTaxBrkDown.value == 'true') {
                obj7.style.visibility = 'hidden';
                obj7.style.display = 'none';
            }
            if (obj8 != null && objHdnChkPosTaxBrkDown != null && objHdnChkPosTaxBrkDown.value == 'true') {
                obj8.style.visibility = 'visible';
                obj8.style.display = 'table-cell';
            }
            if (obj9 != null) {
                obj9.style.visibility = 'hidden';
                obj9.style.display = 'none';
            }
            if (obj10 != null) {
                obj10.style.visibility = 'visible';
                obj10.style.display = 'table-row';
            }
            if (obj11 != null) {
                obj11.style.visibility = 'hidden';
                obj11.style.display = 'none';
            }
            if (obj12 != null) {
                obj12.style.visibility = 'visible';
                obj12.style.display = 'table-row';
            }
            if (obj13 != null) {
                obj13.style.visibility = 'hidden';
                obj13.style.display = 'none';
            }
            if (obj14 != null) {
                obj14.style.visibility = 'visible';
                obj14.style.display = 'table-row';
            }
            if (obj15 != null) {
                obj15.style.visibility = 'hidden';
                obj15.style.display = 'none';
            }
            if (obj16 != null) {
                obj16.style.visibility = 'visible';
                obj16.style.display = 'block';
            }

            if (obj17 != null) {
                obj17.style.visibility = 'hidden';
                obj17.style.display = 'none';
            }
            else if (obj17_1 != null) {
                obj17_1.style.visibility = 'hidden';
                obj17_1.style.display = 'none';
            }

            if (obj18 != null) {
                obj18.style.visibility = 'visible';
                obj18.style.display = 'inline';
            }
            else if (obj18_1 != null) {
                obj18_1.style.visibility = 'visible';
                obj18_1.style.display = 'inline';
            }

            if (obj19 != null) {
                obj19.style.visibility = 'hidden';
                obj19.style.display = 'none';
            }
            if (obj20 != null) {
                obj20.style.visibility = 'visible';
                obj20.style.display = 'table-cell';
            }
            if (obj21 != null) {
                obj21.style.visibility = 'hidden';
                obj21.style.display = 'none';
            }
            if (obj22 != null) {
                obj22.style.visibility = 'visible';
                obj22.style.display = 'table-cell';
            }
            if (obj23 != null) {
                obj23.style.visibility = 'hidden';
                obj23.style.display = 'none';
            }
            if (obj24 != null) {
                obj24.style.visibility = 'visible';
                obj24.style.display = 'table-cell';
            }
            if (obj25 != null) {
                document.getElementById('ctl00_c_tdpayWithCash').className = "payWithCash";

                if (document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty) {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeProperty("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty("background-image");
                }
                else {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeAttribute("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeAttribute("background-image");
                }
            }
            if (obj26 != null) {
                document.getElementById('ctl00_c_tdpayWithMiles').className = "payWithMiles";

                if (document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty) {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeProperty("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty("background-image");
                }
                else {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeAttribute("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeAttribute("background-image");
                }
            }
        }
        else if (obj.checked == true && objID == 'ctl00_c_payWithCash') {
            if (objHdnPayByMiles != null && objHdnPayByCash != null) {
                document.getElementById('ctl00_c_hdnPayByMiles').value = 'false';
                document.getElementById('ctl00_c_hdnPayByCash').value = 'true';
            }
            if (obj1 != null) {
                obj1.style.visibility = 'visible';
                obj1.style.display = 'table-cell';
            }
            if (obj2 != null) {
                obj2.style.visibility = 'visible';
                obj2.style.display = 'table-cell';
            }
            if (obj3 != null) {
                obj3.style.visibility = 'hidden';
                obj3.style.display = 'none';
            }
            if (obj4 != null) {
                obj4.style.visibility = 'hidden';
                obj4.style.display = 'none';
            }
            if (obj5 != null) {
                obj5.style.visibility = 'visible';
                obj5.style.display = 'table-cell';
            }
            if (obj6 != null) {
                obj6.style.visibility = 'hidden';
                obj6.style.display = 'none';
            }
            if (obj7 != null && objHdnChkPosTaxBrkDown != null && objHdnChkPosTaxBrkDown.value == 'true') {
                obj7.style.visibility = 'visible';
                obj7.style.display = 'table-cell';
            }
            if (obj8 != null && objHdnChkPosTaxBrkDown != null && objHdnChkPosTaxBrkDown.value == 'true') {
                obj8.style.visibility = 'hidden';
                obj8.style.display = 'none';
            }
            if (obj9 != null) {
                obj9.style.visibility = 'visible';
                obj9.style.display = 'table-row';
            }
            if (obj10 != null) {
                obj10.style.visibility = 'hidden';
                obj10.style.display = 'none';
            }
            if (obj11 != null) {
                obj11.style.visibility = 'visible';
                obj11.style.display = 'table-row';
            }
            if (obj12 != null) {
                obj12.style.visibility = 'hidden';
                obj12.style.display = 'none';
            }
            if (obj13 != null) {
                obj13.style.visibility = 'visible';
                obj13.style.display = 'table-row';
            }
            if (obj14 != null) {
                obj14.style.visibility = 'hidden';
                obj14.style.display = 'none';
            }
            if (obj15 != null) {
                obj15.style.visibility = 'visible';
                obj15.style.display = 'block';
            }
            if (obj16 != null) {
                obj16.style.visibility = 'hidden';
                obj16.style.display = 'none';
            }

            if (obj17 != null) {
                obj17.style.visibility = 'visible';
                obj17.style.display = 'inline';
            }
            else if (obj17_1 != null) {
                obj17_1.style.visibility = 'visible';
                obj17_1.style.display = 'inline';
            }

            if (obj18 != null) {
                obj18.style.visibility = 'hidden';
                obj18.style.display = 'none';
            }
            else if (obj18_1 != null) {
                obj18_1.style.visibility = 'hidden';
                obj18_1.style.display = 'none';
            }
            if (obj19 != null) {
                obj19.style.visibility = 'visible';
                obj19.style.display = 'table-cell';
            }
            if (obj20 != null) {
                obj20.style.visibility = 'hidden';
                obj20.style.display = 'none';
            }
            if (obj21 != null) {
                obj21.style.visibility = 'visible';
                obj21.style.display = 'table-cell';
            }
            if (obj22 != null) {
                obj22.style.visibility = 'hidden';
                obj22.style.display = 'none';
            }
            if (obj23 != null) {
                obj23.style.visibility = 'visible';
                obj23.style.display = 'table-cell';
            }
            if (obj24 != null) {
                obj24.style.visibility = 'hidden';
                obj24.style.display = 'none';
            }
            if (obj25 != null) {
                document.getElementById('ctl00_c_tdpayWithCash').className = "payWithMiles";
                if (document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty) {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeProperty("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty("background-image");
                }
                else {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeAttribute("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeAttribute("background-image");
                }
            }
            if (obj26 != null) {
                document.getElementById('ctl00_c_tdpayWithMiles').className = "payWithCash";
                if (document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty) {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeProperty("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeProperty("background-image");
                }
                else {
                    document.getElementById('ctl00_c_tdpayWithMiles').style.removeAttribute("background-image");
                    document.getElementById('ctl00_c_tdpayWithCash').style.removeAttribute("background-image");
                }
            }
        }
    }
}

// Added end for 999999
// ref#SAR - START - NEERAJ
function getSaverFlex(dt1, dt2) { // dt1 - dept, dt2 - arr
    var m1 = dt1.substr(3, 3);
    var m2 = dt2.substr(3, 3);
    for (var i = 0; i < 12; i++) {
        if (m1 == monthArrayShort[i]) m1 = i;
        if (m2 == monthArrayShort[i]) m2 = i;
    }
    var cdt1 = new Date(20 + dt1.substr(7, 2), m1, dt1.substr(0, 2));
    var cdt2 = new Date(20 + dt2.substr(7, 2), m2, dt2.substr(0, 2));
    if (cdt1 > cdt2)
        return false;
    else {
        var diff_date = cdt2 - cdt1;
        var num_months = Math.floor((diff_date % 31536000000) / 2628000000);
        //if(num_months>3)
        if (num_months > 2)
            return false;
        else return true;
    }
}
// ref#SAR - END - NEERAJ
function MM_swapImgRestore() { //v3.0
    var i, x, a = document.MM_sr; for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
}

function MM_preloadImages() { //v3.0
    var d = document; if (d.images) {
        if (!d.MM_p) d.MM_p = new Array();
        var i, j = d.MM_p.length, a = MM_preloadImages.arguments; for (i = 0; i < a.length; i++)
            if (a[i].indexOf("#") != 0) { d.MM_p[j] = new Image; d.MM_p[j++].src = a[i]; }
    }
}

function MM_findObj(n, d) { //v4.01
    var p, i, x; if (!d) d = document; if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document; n = n.substring(0, p);
    }
    if (!(x = d[n]) && d.all) x = d.all[n]; for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById) x = d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
    var i, j = 0, x, a = MM_swapImage.arguments; document.MM_sr = new Array; for (i = 0; i < (a.length - 2); i += 3)
        if ((x = MM_findObj(a[i])) != null) { document.MM_sr[j++] = x; if (!x.oSrc) x.oSrc = x.src; x.src = a[i + 2]; }
}
//General function for hiding control, pass the Server Control ID
function VisDisp(objID, n) {
    obj = MM_findObj(objID);
    if (obj != null) {
        switch (n) {
            case 0: obj.style.visibility = 'visible'; break;
            case 1: obj.style.visibility = 'hidden'; break;
            case 2: obj.style.display = 'block'; break;
            case 3: obj.style.display = 'none'; break;
            case 4: obj.style.visibility = 'visible'; obj.style.display = 'block'; break;
            case 5: obj.style.visibility = 'hidden'; obj.style.display = 'none'; break;
            case 6:
                if (navigator.userAgent.indexOf("MSIE") < 0)
                    obj.style.display = '';
                else
                    obj.style.display = 'block';
                break;
            case 7: obj.style.visibility = 'visible'; obj.style.display = ''; break;
            case 8:
                if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
                    obj.style.visibility = 'visible'; obj.style.display = '-mz-inline-block';
                }
                else if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
                    obj.style.visibility = 'visible'; obj.style.display = 'inline-block';
                }
                else {
                    obj.style.visibility = 'visible'; obj.style.display = '';
                }
                break;

        }
    }
}

//1104
function ChkRedeemMiles_Click(objID) {
    if (MM_findObj(objID).checked == true) {
        isRedeem = true;
        shn_showtool('ctl00_c_CtSrchPref_searchByMiles');
        shn_hidetool('ctl00_c_CtSrchPref_searchByDefault');
        if (MM_findObj('ctl00_c_CtWNW_onewaySearch').checked == true) {
            MM_findObj('ctl00_c_hdnRedeemTab').value = 2;
        }
        else if (MM_findObj('returnSearch').checked == true) {
            MM_findObj('ctl00_c_hdnRedeemTab').value = 1;
        }
        else if (MM_findObj('ctl00_c_CtWNW_multipleSearch').checked == true) {
            MM_findObj('ctl00_c_hdnRedeemTab').value = 3;
        }
        SetTabValue(5);
        //shn_hidetool('ctl00_c_CtSrchPref_searchByDefault');
        VisDisp('ctl00_c_CtPrOffer_pnlPOEMCUGO1', 5); //EMAILCUGO
        VisDisp('ctl00_c_CtPrOffer_pnlPOPERISHABLECUGO', 5);
        //neeraj joshi: predictive search
        //isRedeem = true;
        //ReCreateSuggestions();
        //end
        /*SPR2: Skysurfer Integration*/
        $('#ctl00_c_skysurfersMenu').attr('class', '');
        $('#ctl00_c_skysurfersMenu select').attr('disabled', false);
        /*SPR2: Skysurfer Integration - End*/
    }
    else {
        //EMAILCUGO
        isRedeem = false;
        shn_showtool('ctl00_c_CtSrchPref_searchByDefault');
        shn_hidetool('ctl00_c_CtSrchPref_searchByMiles');
        SetCashTabValue();
        //EMAILCUGO
        if (MM_findObj('ctl00_c_CtPrOffer') != null && MM_findObj('ctl00_c_CtPrOffer_txtEnterCode') != null && MM_findObj('ctl00_c_CtPrOffer_txtEnterCode').value.length >= 7) {

            var val = MM_findObj('ctl00_c_CtPrOffer_txtEnterCode').value.substring(MM_findObj('ctl00_c_CtPrOffer_txtEnterCode').value.length - 2);
            /*NovCUGO
            if(val == '99')
            {
                VisDisp('ctl00_c_pnlPOEMCUGO',4);
                VisDisp('ctl00_c_pnlPOPERISHABLECUGO',5);//percugo
            }
            else*/
            if (val == '88')//percugo begin
            {
                VisDisp('ctl00_c_CtPrOffer_pnlPOPERISHABLECUGO', 4);
                VisDisp('ctl00_c_CtPrOffer_pnlPOEMCUGO1', 5);
                $('#ctl00_c_CtPrOffer_txtRefNumber').blur();
            }//percugo end            
        }
        //neeraj joshi: predictive search
        //isRedeem = false;
        //ReCreateSuggestions();
        //end 
        /*SPR2: Skysurfer Integration*/
        $('#ctl00_c_skysurfersMenu').attr('class', 'disabled');
        $('#ctl00_c_skysurfersMenu select').attr('disabled', true);
        var objDdl = MM_findObj('ctl00_c_ddlMinorAccntSelect');
        if (objDdl != null) {
            if (objDdl.options.length > 0) {
                objDdl.selectedIndex = 0;
            }
        }
        /*SPR2: Skysurfer Integration - End*/
    }
}

function showPopupMessage() {
    MM_findObj("wrapper").style.visibility = 'hidden';
    MM_findObj("wrapper").style.display = 'none';
    MM_findObj("PLayer").style.visibility = 'visible';
    MM_findObj("PLayer").style.display = 'block';
}
//if dt1 is greater than dt2 then this function will return false
//format for parameters is dd-MMM-yy
function CompareDate(dt1, dt2) {
    if (currentCulture == "cs-CZ") {
        if (dt1.indexOf("-") > 0) {
            dt1 = foramtDateforCompareDate(dt1, "dd-MMM-yy");
        }
        else if (dt1.indexOf(".") > 0) {
            dt1 = foramtDateforCompareDate(dt1, MM_findObj('ctl00_c_CtWNW_hdnTxtField').value);
        }

        if (dt2.indexOf(".") > 0) {
            dt2 = foramtDateforCompareDate(dt2, MM_findObj('ctl00_c_CtWNW_hdnTxtField').value);
        }
        if (dt1 > dt2)
            return false;
        else
            return true;
    }

    var m1 = dt1.substr(3, 3);
    var m2 = dt2.substr(3, 3);
    for (var i = 0; i < 12; i++) {
        if (m1 == monthArrayShort[i]) m1 = i;
        if (m2 == monthArrayShort[i]) m2 = i;
    }
    var cdt1 = new Date(20 + dt1.substr(7, 2), m1, dt1.substr(0, 2));
    var cdt2 = new Date(20 + dt2.substr(7, 2), m2, dt2.substr(0, 2));
    if (cdt1 > cdt2)
        return false;
    else return true;
}
function foramtDateforCompareDate(dtvalue, dtfrmt) {
    var formattedDate = "";
    var monthArrayShort1 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var monthArrayShort2 = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    var monthArrayShort3 = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    var dtdelimiter = '';
    var dd = "";
    var mm = "";
    var yy = "";
    if (dtfrmt.indexOf("/") > -1) {
        dtdelimiter = '/';
    }
    if (dtfrmt.indexOf(".") > -1) {
        dtdelimiter = '.';
    }
    if (dtfrmt.indexOf("-") > -1) {
        dtdelimiter = '-';
    }
    if (dtfrmt.indexOf(" ") > -1) {
        dtdelimiter = ' ';
    }
    if (dtdelimiter == "") {
        formattedDate = dtvalue;
    }
    else {
        if (dtdelimiter.length > 0) {
            //seperate the format with delimiter
            var arrdtfrmt = dtfrmt.split(dtdelimiter);
            var arrdtvalue = dtvalue.split(dtdelimiter);
            for (var i = 0; i < arrdtfrmt.length; i++) {
                if (arrdtfrmt[i].indexOf("d") > -1) {
                    dd = arrdtvalue[i];
                    if (dd.length != 2)
                        dd = ("0" + dd).slice(-2);
                }
                if (arrdtfrmt[i].indexOf("M") > -1) {
                    mm = arrdtvalue[i];
                    if (isNum(mm)) {
                        if (mm.length <= 2) {
                            mm = ("0" + mm).slice(-2);
                        }
                        for (var j = 0; j < 12; j++) {
                            if (mm == monthArrayShort2[j]) {
                                mm = j;
                                break;
                            }
                        }
                    }
                    else if (isRoman(mm)) {
                        for (var j = 0; j < 12; j++) {
                            if (mm == monthArrayShort3[j]) {
                                mm = j;
                                break;
                            }
                        }
                    }
                    else if (isAlpha(mm)) {
                        for (var j = 0; j < 12; j++) {
                            if (mm == monthArrayShort[j]) {
                                mm = j;
                                break;
                            }
                        }
                    }
                }
                if (arrdtfrmt[i].indexOf("y") > -1) {
                    yy = arrdtvalue[i];
                    if (yy.length == 2) {
                        yy = 20 + yy;
                    }
                }
            }
            var compDate = new Date(yy, mm, dd);
            formattedDate = compDate;

        }
    }
    return formattedDate;
}

function Trim(s) {
    // Remove leading spaces and carriage returns
    while ((s.substring(0, 1) == ' ') || (s.substring(0, 1) == '\n') || (s.substring(0, 1) == '\r')) {
        s = s.substring(1, s.length);
    }
    // Remove trailing spaces and carriage returns
    while ((s.substring(s.length - 1, s.length) == ' ') || (s.substring(s.length - 1, s.length) == '\n') || (s.substring(s.length - 1, s.length) == '\r')) {
        s = s.substring(0, s.length - 1);
    }
    return s;
}
function isValidFF(parm, crcode) {
    var fb = true;
    var s1 = parm.substr(0, 2);
    if (crcode == 'CO') {
        fb = isValid(s1, upr + lwr);
        if (fb == true) {
            s1 = parm.substr(2);
            fb = isValid(s1, numb);
        }
    }
    else {
        fb = isValid(parm, numb);
    }
    return fb;
}
var numb = '0123456789';
var floatNumb = '0123456789.';
var lwr = 'abcdefghijklmnopqrstuvwxyz';
var upr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var space = ' ';
var splChar1 = '_-@.';
var splChar2 = '-/#&()[]';
var splChar3 = '\\/\'`-.';//Allowed Characters for Name
var splChar4 = '\'`\\/-.{}[]()#\;:,&';//Allowed Characters for Address Fields
var phonetics = '-ǞǟǠǡǢǣǍǎǺǻǼǽȀȁȂȃάΆÄäáàãÃÅåÀÁâÂÆæẠạẢảẤấẦầẨẩẪẫẬậẮắẰằẲẳẴẵẶặẚĀāĂăĄąȦȧḀḁḂḃḄḅḆḇƀƁƂƃƄƅḈḉĆćĈĉĊċČčçÇƇƈȡḊḋḌḍḎḏḐḑḒḓĎďĐđÐƉƊƋƌǱǲǳǄǅǆḔḕḖḗḘḙḚḛḜḝȨȩĒēĔĕĖėĘęĚěéέèêëÈÉÊΈËệỆễỄểỂềỀếẾẽẼẻẺẹẸƍƎƏƐȄȅȆȇǝḞḟƑƒǴǵḠḡȜȝĜĝĞğĠġĢģǤǥǦǧƓḢḣḤḥḦḧḨḩḪḫȞȟĤĥĦħΉẖƕǏǐǷḬḭḮḯήύïð¿ÞþĨĩĪīĬĭĮįίíÍÏıiÌİÎîìΊΪịỊỉỈȈȉȊȋĲĳĴĵǰƖǨǩḰḱḲḳḴḵĶķĸƘƙƗƚƛḶḷḸḹḺḻḼḽĹĺĻļĽľĿŀŁłǇǈǉḾḿṀṁṂṃƜǸǹṄṅṆṇṈṉṊṋŃńŅņŇňŉŊŋñÑȠǊǋǌƝƞǪǫǬǭṌṍṎṏṐṑṒṓȪȫȬȭȮȯȰȱΏώØøÕŌōŎŏŐőÖöÒÓÔôóόòõợỢỡỠởỞờỜớỚộỘỗỖổỔồỒốỐỗỖỏỎỗỖọỌƆȌȍȎȏǾǿȢȣƟƠơǑǒƢƣṔṕṖṗƤƥṘṙṚṛṜṝṞṟŔŕŖŗŘřȐȑȒȓṠṡṢṣṤṥṦṧṨṩŚśŜŝşŞßẛſŠšȘșṪṫṬṭṮṯṰṱȚțŢţŤťŦŧẗƫƬƭƮǓǔǕǖǗǘǙǚǛǜṲṳṴṵṶṷṸṹṺṻÚŨũŪūŬŭŮůŰűŲųÛùÙÜüûúựỰữỮửỬừỪứỨủỦụỤȔȕȖȗƯưƱṼṽṾṿǶƔƲẀẁẂẃẄẅẆẇẈẉŵŴẘẊẋẌẍẎẏȲȳýÿŷỳΎŶÝŸỲΫỹỸỷỶỵỴẙƳƴƦƧƨẐẑẕẔẓẒȤȥŹźŻżŽžǮǯƵƶƷƸƹƺ';//European Accents for Name and Address
var roman = 'IVX';
var splCharGST = '-/';

function isValid(parm, val) {
    if (parm == "") return true;
    for (j = 0; j < parm.length; j++) {
        if (val.indexOf(parm.charAt(j), 0) == -1) return false;
    }
    return true;
}

function isLower(parm) { return isValid(parm, lwr); }
function isUpper(parm) { return isValid(parm, upr); }
//Appendix 6.1.1
function isAlphaSpace(parm) { return isValid(parm, lwr + upr + space); }
//Appendix 6.1.2
function isAlpha(parm) { return isValid(parm, lwr + upr); }
//Appendix 6.1.3
function isNum(parm) { return isValid(parm, numb); }
//added for currency
function isFloat(parm) { return isValid(parm, floatNumb); }
//Appendix 6.1.5
function isAlphanumSpace(parm) { return isValid(parm, lwr + upr + numb + space); }
//Appendix 6.1.6
function isAlphanum(parm) { return isValid(parm, lwr + upr + numb); }
//Appendix 6.1.7
function isAlphanumSP1(parm) { return isValid(parm, lwr + upr + numb + splChar1); }
//Appendix 6.1.8
function isAlphaSP1(parm) { return isValid(parm, lwr + upr + splChar1); }
//Appendix 6.1.9
function isAlphanumSP2(parm) { return isValid(parm, lwr + upr + numb + splChar2 + space); }

function isAlphaspaceSP1(parm) { return isValid(parm, lwr + upr + space + phonetics); }
//1054
function isAlphaSP3(parm) { return isValid(parm, lwr + upr + space + splChar3 + phonetics); }
function isAlphanumSP3(parm) { return isValid(parm, lwr + upr + numb + space + splChar4 + phonetics); }

//to handle czech date format
function isRoman(parm) { return isValid(parm, roman); }

//to handle GST address field
function isAlphanumSPGST(parm) { return isValid(parm, lwr + upr + numb + space + splCharGST); }

//Change first latter to Caps
function changeFirstLetterToCaps(obj) {
    var vParam = obj.value;
    //1054 Special Characters
    if (isAlpha(vParam.substr(0, 1)))
        obj.value = vParam.substr(0, 1).toUpperCase() + vParam.substr(1);

}
function isValidCreditCard(type, ccnum)  // Modified as per 13 digit Visa card No
{
    // Array to hold the permitted card characteristics
    var cards = new Array();
    // Define the cards we support. You may add addtional card types.

    //  Name:      As in the selection box of the form - must be same as user's
    //  Length:    List of possible valid lengths of the card number for the card
    //  prefixes:  List of possible prefixes for the card
    //  checkdigit Boolean to say whether there is a check digit

    if (type == "GHLINK") {
        return true;
    }
    cards[0] = {
        name: "VISA",
        length: "13,16",
        prefixes: "4",
        checkdigit: true
    };
    cards[1] = {
        name: "MAST",
        length: "16",
        prefixes: "51,52,53,54,55,22,23,24,25,26,27",
        checkdigit: true
    };
    cards[2] = {
        name: "DINERS",
        length: "14,16",
        prefixes: "300,301,302,303,304,305,36,38,55",
        checkdigit: true
    };
    cards[3] = {
        name: "CarteBlanche",
        length: "14",
        prefixes: "300,301,302,303,304,305,36,38",
        checkdigit: true
    };
    cards[4] = {
        name: "AMEX",
        length: "15",
        prefixes: "34,37",
        checkdigit: true
    };
    cards[5] = {
        name: "Disc",
        length: "16",
        prefixes: "6011,650",
        checkdigit: true
    };
    cards[6] = {
        name: "JCB",
        length: "16,19",
        prefixes: "35",
        checkdigit: true
    };
    cards[7] = {
        name: "enRoute",
        length: "15",
        prefixes: "2014,2149",
        checkdigit: true
    };
    cards[8] = {
        name: "Solo",
        length: "16,18,19",
        prefixes: "4,5,6,6334,6767",
        checkdigit: true
    };
    cards[9] = {
        name: "Switch",
        length: "16,18,19",
        prefixes: "4903,4905,4911,4936,564182,633110,6333,6759",
        checkdigit: true
    };
    cards[10] = {
        name: "Maestro",
        length: "16,18",
        prefixes: "5,6",
        checkdigit: true
    };
    cards[11] = {
        name: "VISAELEC",
        length: "16",
        prefixes: "4",
        checkdigit: true
    };
    cards[12] = {
        name: "CarteBleue",
        length: "16",
        prefixes: "581784,6,4,5",
        checkdigit: true
    };
    cards[13] = {
        name: "CarteBleueVisa",
        length: "16",
        prefixes: "581784,6,4,5",
        checkdigit: true
    };
    cards[14] = {
        name: "POSTEPAYMAST",  // start 964
        length: "16",
        prefixes: "51,52,53,54,55",
        checkdigit: true
    };
    cards[15] = {
        name: "POSTEPAYVISA",
        length: "13,16",
        prefixes: "4",
        checkdigit: true
    };
    cards[16] = {
        name: "UATP",
        length: "15,16",
        prefixes: "1",
        checkdigit: true
    };  // end 964
    cards[17] = {
        name: "VISADANKORT", // start 1086
        length: "13,16",
        prefixes: "4",
        checkdigit: true
    };// end 1086
    cards[18] = {
        name: "TPCARD",
        length: "15,16",
        prefixes: "1",
        checkdigit: true
    };
    cards[19] = {
        name: "MIR",
        length: "16",
        prefixes: "22",
        checkdigit: true
    }; // end 964
    // Establish card type
    var cardType = -1;
    for (var i = 0; i < cards.length; i++) {

        // See if it is this card (ignoring the case of the string)
        //if (cardname.toLowerCase () == cards[i].name.toLowerCase()) {
        if (type.toLowerCase() == cards[i].name.toLowerCase()) {
            cardType = i;
            break;
        }
    }

    // If card type not found, report an error
    if (cardType == -1) {
        ccErrorNo = 0;
        return false;
    }

    // Ensure that the user has provided a credit card number
    if (ccnum.length == 0) {
        ccErrorNo = 1;
        return false;
    }

    // Now remove any spaces from the credit card number
    cardnumber = ccnum.replace(/\s/g, "");

    // Check that the number is numeric
    var cardNo = cardnumber
    var cardexp = /^[0-9]{13,19}$/;
    if (!cardexp.exec(cardNo)) {
        ccErrorNo = 2;
        return false;
    }

    // Now check the modulus 10 check digit - if required
    if (cards[cardType].checkdigit) {
        var checksum = 0;                                  // running checksum total
        var mychar = "";                                   // next char to process
        var j = 1;                                         // takes value of 1 or 2

        // Process each digit one by one starting at the right
        var calc;
        for (i = cardNo.length - 1; i >= 0; i--) {

            // Extract the next digit and multiply by 1 or 2 on alternative digits.
            calc = Number(cardNo.charAt(i)) * j;

            // If the result is in two digits add 1 to the checksum total
            if (calc > 9) {
                checksum = checksum + 1;
                calc = calc - 10;
            }

            // Add the units element to the checksum total
            checksum = checksum + calc;

            // Switch the value of j
            if (j == 1) { j = 2 } else { j = 1 };
        }

        // All done - if checksum is divisible by 10, it is a valid modulus 10.
        // If not, report an error.
        if (checksum % 10 != 0) {
            ccErrorNo = 3;
            return false;
        }
    }

    // The following are the card-specific checks we undertake.
    var LengthValid = false;
    var PrefixValid = false;
    var undefined;

    // We use these for holding the valid lengths and prefixes of a card type
    var prefix = new Array();
    var lengths = new Array();

    // Load an array with the valid prefixes for this card
    prefix = cards[cardType].prefixes.split(",");

    // Now see if any of them match what we have in the card number
    for (i = 0; i < prefix.length; i++) {
        var exp = new RegExp("^" + prefix[i]);
        if (exp.test(cardNo)) PrefixValid = true;
    }

    // If it isn't a valid prefix there's no point at looking at the length
    if (!PrefixValid) {
        ccErrorNo = 3;
        return false;
    }

    // See if the length is valid for this card
    lengths = cards[cardType].length.split(",");
    for (j = 0; j < lengths.length; j++) {
        if (cardNo.length == lengths[j]) LengthValid = true;
    }

    // See if all is OK by seeing if the length was valid. We only check the 
    // length if all else was hunky dory.
    if (!LengthValid) {
        ccErrorNo = 4;
        return false;
    };

    // The credit card is in the required format.
    return true;
}
function isValidCreditCardOld(type, ccnum) {
    //if (type == "Visa") 
    if (type == "VISA") {
        // Visa: length 16, prefix 4, dashes optional.
        var re = /^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/;
    }
    //else if (type == "MC") 
    else if (type == "MAST") {
        // Mastercard: length 16, prefix 51-55, dashes optional.
        var re = /^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/;
    }
    else if (type == "Disc") {
        // Discover: length 16, prefix 6011, dashes optional.
        var re = /^6011-?\d{4}-?\d{4}-?\d{4}$/;
    }
    //else if (type == "AmEx") 
    else if (type == "AMEX") {
        // American Express: length 15, prefix 34 or 37.
        var re = /^3[4,7]\d{13}$/;
    }
    //else if (type == "Diners") 
    else if (type == "DINERS") {
        // Diners: length 14, prefix 30, 36, or 38.
        var re = /^3[0,6,8]\d{12}$/;
    }
    if (re) {
        if (!re.test(ccnum)) return false;
    }
    else {
        return false;
    }
    // Remove all dashes for the checksum checks to eliminate negative numbers
    ccnum = ccnum.split("-").join("");
    // Checksum ("Mod 10")
    // Add even digits in even length strings or odd digits in odd length strings.
    var checksum = 0;
    for (var i = (2 - (ccnum.length % 2)); i <= ccnum.length; i += 2) {
        checksum += parseInt(ccnum.charAt(i - 1));
    }
    // Analyze odd digits in even length strings or even digits in odd length strings.
    for (var i = (ccnum.length % 2) + 1; i < ccnum.length; i += 2) {
        var digit = parseInt(ccnum.charAt(i - 1)) * 2;
        if (digit < 10) {
            checksum += digit;
        } else {
            checksum += (digit - 9);
        }
    }
    if ((checksum % 10) == 0) return true; else return false;
}
function isEmail(string) {
    //    if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)!= -1)
    //    return true;
    //    else
    //    return false;
    var re = /^[A-Za-z0-9]+[\w\-\_\.]*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    return re.test(string);
}
function openWindow(optionId, curr, amt) {
    if (optionId == -1) {
        mywindow = window.open("./CurrencyConverter.aspx?curr=" + curr + "&amt=" + amt, "CurrencyConverter", "top=100,left=200,title=0,location=0,status=0,scrollbars=0,menubar=0,resizable=0,width=615,height=450");
    }
    else {
        mywindow = window.open("./FareBreakUp.aspx?oid=" + optionId, "FareBreakUp", "top=100,left=200, title=0,location=0,status=0,scrollbars=0,menubar=0,resizable=0,width=615,height=570");
    }
    //mywindow.moveTo(225,100);    

    return false;
}


// SSL Layer
function openCurrSSL(curr, amt) {
    mywindow = window.open("../IBE/CurrencyConverter.aspx?curr=" + curr + "&amt=" + amt, "CurrencyConverter", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=635,height=330");
    return false;
}
function openCurrSSLMYB(curr, amt, ibepath, pub, cult) {
    mywindow = window.open(ibepath + "/IBE/CurrencyConverter.aspx?pub=" + pub + "&cult=" + cult + "&curr=" + curr + "&amt=" + amt, "CurrencyConverter", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=635,height=330");
    return false;
}
function openFareCondn(oid, sb, ItinDel, APId, RNo, CU) {
    //mywindow = window.open("./FareCondition.aspx?rb="+ItinDel+"&aId="+APId+"&rNo="+RNo+"&cu="+CU, "Fare_Condition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    mywindow = window.open("./FareCondition.aspx?oid=" + oid + "&sb=" + sb + "&rb=" + ItinDel + "&aId=" + APId + "&rNo=" + RNo + "&cu=" + CU, "Fare_Condition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openFareCondnSSL(oid, sb, ItinDel, APId, RNo, CU) {
    mywindow = window.open("../IBE/FareCondition.aspx?oid=" + oid + "&sb=" + sb + "&rb=" + ItinDel + "&aId=" + APId + "&rNo=" + RNo + "&cu=" + CU, "Fare", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openFareCondnPDFSSL(objP, objSession) {
    mywindow = window.open("../IBE/FareConditionPDF.aspx?RequestSessionID=" + objSession + "&o=" + objP, "Fare_Condition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openFareCondnPDF(objP, objSession) {

    mywindow = window.open("./FareConditionPDF.aspx?RequestSessionID=" + objSession + "&o=" + objP, "Fare", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openFareRuleSSL() {
    mywindow = window.open("../IBE/FareRuleRedeem.aspx", "Fare_Condition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}

//START CUGO ENHANCEMENT
function openCugoPromotionRuleSSL() {
    mywindow = window.open("../CUGO/CugoPromotionRule.aspx", "CugoFare_Condition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}

function AlertUser(message) {
    if (window.event.srcElement.id != null && window.event.srcElement.id == '' && window.location.toString().indexOf('CUGOLandingPage.aspx') != -1) {
        var msg = message;
        var a = confirm(msg);
        if (a == false) {
            return false;
        }
        else {
            return true;
        }
    }
}
//END CUGO ENHANCEMENT

// End SSL Layer
// start oct2010TDB
function openTaxBreakdown(caller, paytype, currcode, resultby, totalamt) {              //window.open("./CurrencyConverter.aspx?curr="+curr+"&amt="+amt, "CurrencyConverter", "top=100,left=200,title=0,location=0,status=0,scrollbars=0,menubar=0,resizable=0,width=615,height=450");
    mywindow = window.open("../IBE/TaxesBreakdown.aspx?Caller=" + caller + "&PayBy=" + paytype + "&CurrCode=" + currcode + "&SearchType=" + resultby + "&TotalAmt=" + totalamt, "TaxesBreakdown", "top=100,left=25,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=1,width=900,height=500");
    return false;
}
//IBESplit - Start
function openTaxBreakdownforUpgrade(caller, currcode, ibePath) {
    mywindow = window.open(ibePath + "/IBE/TaxesBreakdown.aspx?Caller=" + caller + "&CurrCode=" + currcode, "TaxesBreakdown", "top=100,left=25,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=800,height=300");
    return false;
}
//IBESplit - End
function openTPTaxBreakdown() {
    mywindow = window.open("/MYB/TPTaxBreakDown.aspx", "top=100,left=25,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=780,height=350");
    return false;
}
// end oct2010TDB
function openEarnMiles(resultBy, optionId, ItinDel) {
    mywindow = window.open("./EarnMiles.aspx?rb=" + resultBy + "&id=" + optionId + "&itn=" + ItinDel, "EM", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=450");
    return false;
}
function openFareRuleRedeem() {
    mywindow = window.open("./FareRuleRedeem.aspx", "Fare_Redeem", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openFlightInfo(airLegId, flightType, FlightNo, airSegId)//Ver 13.3.0 - #1783 - Flightinfo details in schedule search 
{
    mywindow = window.open("../IBE/FlightInfo.aspx?al=" + airLegId + "&ft=" + flightType + "&fn=" + FlightNo + "&as=" + airSegId, "Flight_Info", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=950,height=300");
    return false;
}
function fnDefault() {
    return false;
}
function IsCouNumber(parm) {
    var fb = false;
    var s1 = parm.substr(0, 1);
    if (s1 == "+" || isAlphanum(parm))//1327 Banu
    {
        s1 = parm.substr(0, parm.length - 2);
        fb = isNum(s1);
    }
    return fb;
}
function promoCondn() {
    mywindow = window.open("../IBE/PromotionalCondn.aspx", "Promotional_Condn", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}

function OpenSSlashwindow(FlightNo, FlightDate, Host, DeptCode, ArrCode) {
    window.open("/MYB/MYBFlightDetails.aspx?fl='" + FlightNo + "'&dt='" + FlightDate + "'&ht='" + Host + "'&dac=" + DeptCode + "&aac=" + ArrCode, "_new", "menubar=0,width=750,height=250,scrollbars=1");
    return false;
}

function IsCaValid(ctl, snx) {
    var txtSN = MM_findObj(snx);

    var errMsg = '';
    if (Trim(txtSN.value) == '') { errMsg = 'Account Number cannot be blank'; }
    var chkRA = MM_findObj(ctl);
    if (chkRA.checked == false) {
        if (errMsg == '') { errMsg = 'Please Check the Read Agreement'; }
        else { errMsg = errMsg + '\n' + 'Please Check the Read Agreement'; }
    }
    if (errMsg != '') {
        alert(errMsg);
        CaptureClientEventTeaLeaf(errMsg);
        return false;
    }
    else { return true; }
}

function openSmeWindow(optionId, curr, amt) {
    if (optionId == -1) {
        mywindow = window.open("../../IBE/CurrencyConverter.aspx?curr=" + curr + "&amt=" + amt, "CurrencyConverter", "top=100,left=200,title=0,location=0,status=0,scrollbars=0,menubar=0,resizable=0,width=615,height=450");
    }
    else {
        mywindow = window.open("../../IBE/FareBreakUp.aspx?oid=" + optionId, "FareBreakUp", "top=100,left=200, title=0,location=0,status=0,scrollbars=0,menubar=0,resizable=0,width=615,height=570");
    }
    //mywindow.moveTo(225,100);    

    return false;
}

function openSmeFareCondn(ItinDel, APId, RNo, CU) {
    mywindow = window.open("../../IBE/FareCondition.aspx?rb=" + ItinDel + "&aId=" + APId + "&rNo=" + RNo + "&cu=" + CU, "Fare_Condition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}

function CheckBRP() {

    if (MM_findObj('ctl00_txtBRP').value == "1") {
        history.go(1);
    }

}
function IsValidDate(d, m, y) {
    var yl = 1901; // least year to consider
    var ym = 9999; // most year to consider
    if (!isNum(d)) return (false);
    if (!isNum(m)) return (false);
    if (!isNum(y)) return (false);
    if (m < 1 || m > 12) return (false);
    if (d < 1 || d > 31) return (false);
    if (y < yl || y > ym) return (false);
    if (m == 4 || m == 6 || m == 9 || m == 11)
        if (d == 31) return (false);
    if (m == 2) {
        var b = parseInt(y / 4);
        if (isNaN(b)) return (false);
        if (d > 29) return (false);
        if (d == 29 && ((y / 4) != parseInt(y / 4))) return (false);
    }
    return (true);
}
function getDateObject(dateString, dateSeperator) {
    //This function return a date object after accepting 
    //a date string ans dateseparator as arguments
    var curValue = dateString;
    var sepChar = dateSeperator;
    var curPos = 0;
    var cDate, cMonth, cYear;

    //extract day portion
    curPos = dateString.indexOf(sepChar);
    cDate = dateString.substring(0, curPos);

    //extract month portion				
    endPos = dateString.indexOf(sepChar, curPos + 1);
    cMonth = dateString.substring(curPos + 1, endPos);

    //extract year portion				
    curPos = endPos;
    endPos = curPos + 5;
    cYear = curValue.substring(curPos + 1, endPos);

    //Create Date Object
    dtObject = new Date(cYear, cMonth, cDate);
    return dtObject;
}

function isitToday(dateString, dateType) {
    /*
       function isitToday 
       parameters: dateString dateType
       returns: boolean
       
       dateString is a date passed as a string in the following
       formats:
    
       type 1 : 19970529
       type 2 : 970529
       type 3 : 29/05/1997
       type 4 : 29/05/97
       
       dateType is a numeric integer from 1 to 4, representing
       the type of dateString passed, as defined above.
    
       Returns true if the date passed is equal to todays date
       Returns false if the date passed is NOT equal to todays
       date or if dateType is not 1 to 4.
    */


    var now = new Date();
    var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    if (dateType == 1)
        var date = new Date(dateString.substring(0, 4),
            dateString.substring(4, 6) - 1,
            dateString.substring(6, 8));
    else if (dateType == 2)
        var date = new Date(dateString.substring(0, 2),
            dateString.substring(2, 4) - 1,
            dateString.substring(4, 6));
    else if (dateType == 3)

        var date = new Date(dateString.substring(6, 10),
            dateString.substring(3, 5) - 1,
            dateString.substring(0, 2));
    else if (dateType == 4)
        var date = new Date(dateString.substring(6, 8),
            dateString.substring(3, 5) - 1,
            dateString.substring(0, 2));
    else
        return false;
    if (date > today)
        return true;
    else
        return false;
}
//SKYUpgrades Begin
function openMilesBreakdown() {
    mywindow = window.open("../MYB/MilesBreakdown.aspx", "MilesBreakdown", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openUpgradeFareCondition() {
    mywindow = window.open("../MYB/UpgradeFareCondition.aspx", "UpgradeFareCondition", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}
function openExBgUnavailable() {
    mywindow = window.open("../MYB/ExBgUnavailable.aspx", "Unavailable", "top=100,left=200,title=0,location=0,status=0,scrollbars=1,menubar=0,resizable=0,width=631,height=600");
    return false;
}

function shn_check_all(ctrlnm, status) {
    var checkItems = document.getElementsByTagName('input');
    var val = ctrlnm.checked;
    for (var i = 0; i < checkItems.length; i++) {
        if (checkItems.item(i).type == "checkbox" && checkItems.item(i).disabled == false) {
            if (status == 0)
                checkItems[i].checked = Boolean(val);
            else if (status == 1)
                checkItems[i].checked = !Boolean(val);
        }
    }
}
function IsCheckBoxChecked() {
    var checkItems = document.getElementsByTagName('input');
    var val = "";
    for (var i = 0; i < checkItems.length; i++) {
        if (checkItems.item(i).type == "checkbox") {
            if (checkItems[i].checked == true) {
                val = "1";
                return true;
            }
            else {
                val = "0";
            }
        }
    }
    if (val == "0") {
        var str = 'Please select atleast one flight segment to upgrade';
        //WACG-DungLe
        //comment because there is nolonger alert. we used new error framework
        //alert(str);
        //WACG END
        CaptureClientEventTeaLeaf(str);
        return false;
    }
    else {
        return true;
    }
}
//SKYUpgrades End
//ref#SKYRL - Begin
//Author - Pravat Kumar  Created On : 21Jul09
function randomString(param) {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 8;
    var randomstring = '';
    var randomstring2 = '';
    for (var i = 0; i < string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum, rnum + 1);
    }
    if (param == 'P1') {
        randomstring += 'LM';
    }
    else if (param == 'P2') {
        randomstring += 'FB';
    }
    else if (param == 'P3') {
        randomstring += 'MB';
    }
    for (var i = 0; i < 4; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring2 += chars.substring(rnum, rnum + 1);
    }
    randomstring += randomstring2;
    randomstring = randomstring.toUpperCase();
    return randomstring;
}
function ReturnMaxCntr(pgIndex, totRec, perPg) {
    var maxCntr;
    pgIndex = Number(pgIndex);
    totRec = Number(totRec);
    perPg = Number(perPg);

    if (totRec > perPg) {
        maxCntr = perPg;
    }
    else {
        maxCntr = totRec;
    }
    if (pgIndex > 1 && totRec > 0) {
        if (totRec > perPg) {
            if ((pgIndex * perPg) > totRec) {
                maxCntr = totRec % perPg;
            }
        }
    }
    return maxCntr;
}
function ReturnRowIndex(ExpandOptId, PP, aryOptID) {
    var intRowIndex = -1;
    var OptId;
    for (var intCntr = 0; intCntr < aryOptID.length; intCntr++) {
        OptId = Number(aryOptID[intCntr]);
        ExpandOptId = Number(ExpandOptId);
        if (OptId == ExpandOptId) {
            intRowIndex = intCntr;
            if (intCntr >= PP) {
                intRowIndex = intCntr % PP;
            }
            return intRowIndex;
        }
    }
    return intRowIndex;
}
//ref#SKYRL - End


//ref#SKYRL - Begin - [Source - Atmosphere]
// IMAGE ROLLOVERS

function MM_swapImgRestore() { //v3.0
    var i, x, a = document.MM_sr; for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
}

function MM_preloadImages() { //v3.0
    var d = document; if (d.images) {
        if (!d.MM_p) d.MM_p = new Array();
        var i, j = d.MM_p.length, a = MM_preloadImages.arguments; for (i = 0; i < a.length; i++)
            if (a[i].indexOf("#") != 0) { d.MM_p[j] = new Image; d.MM_p[j++].src = a[i]; }
    }
}

function MM_findObj(n, d) { //v4.01
    var p, i, x; if (!d) d = document; if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document; n = n.substring(0, p);
    }
    if (!(x = d[n]) && d.all) x = d.all[n]; for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById) x = d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
    var i, j = 0, x, a = MM_swapImage.arguments; document.MM_sr = new Array; for (i = 0; i < (a.length - 2); i += 3)
        if ((x = MM_findObj(a[i])) != null) { document.MM_sr[j++] = x; if (!x.oSrc) x.oSrc = x.src; x.src = a[i + 2]; }
}


// POP UP NEW WINDOW and RESIZE TO DEFINED WIDTH and HEIGHT

function openwin(pagetype, width, height) {
    openwindow = open(pagetype, "win2", "screenx=60,screeny=60,width=" + width + ",height=" + height + ",resizable=1,scrollbars=yes,");
    openwindow.focus();
}


// FORM INPUT TEXT CLEAR (Currently used on Booking Widget, Service Finder Widget)

function textClear(theText) {
    if (theText.value == theText.defaultValue) {
        theText.value = ""
    }
}


// SHOW/HIDE FUNCTIONALITY

// Currently used for Windowshading Functionality and on Media Player to swap out Media Types

function shn_showtool(id) {
    var elm = document.getElementById(id)
    elm.style.display = "block"
}

function shn_showrow(id) {
    var elm = document.getElementById(id);
    elm.style.display = "";
}

function shn_hidetool(id) {
    var elm = document.getElementById(id)
    elm.style.display = "none"
}

function shn_hide_all() {
    var cnt_div = 1;
    while (cnt_div < 6) {
        var elmname = "person_over_" + cnt_div;
        cnt_div++;
        document.getElementById(elmname).style.display = "none"
    }
    var cnt_div = 1;
    while (cnt_div < 6) {
        var elmname = "passengerName" + cnt_div;
        cnt_div++;
        document.getElementById(elmname).style.display = "none"
    }
    var cnt_div = 1;
    while (cnt_div < 6) {
        var elmname = "form_" + cnt_div;
        cnt_div++;
        document.getElementById(elmname).style.display = "none"
    }
    var cnt_div = 1;
    while (cnt_div < 6) {
        var elmname = "person_" + cnt_div;
        cnt_div++;
        document.getElementById(elmname).style.display = "block"
    }

}

function showMobileNumberField() {
    var optval1 = "0";
    var optval2 = "0";
    var optval3 = "0";
    var optval4 = "0";
    if (document.getElementById("countrycode_mobile_1")) {
        optval1 = document.getElementById("countrycode_mobile_1").value;
    }

    if (document.getElementById("countrycode_mobile_2")) {
        optval2 = document.getElementById("countrycode_mobile_2").value;
    }

    if (document.getElementById("countrycode_mobile_3")) {
        optval3 = document.getElementById("countrycode_mobile_3").value;
    }

    if (document.getElementById("countrycode_mobile_4")) {
        optval4 = document.getElementById("countrycode_mobile_4").value;
    }

    if (optval1 == "CA" || optval1 == "US") {
        document.getElementById("mobileNumber_short_1").style.display = "block";
        document.getElementById("mobileNumber_long_1").style.display = "none";
    }
    if (optval1 == "AU" || optval1 == "AT" || optval1 == "BH" || optval1 == "BD" || optval1 == "BR" || optval1 == "CN" || optval1 == "CO" || optval1 == "CI" || optval1 == "CY" || optval1 == "DK" || optval1 == "EG" || optval1 == "ET" || optval1 == "FR" || optval1 == "DE" || optval1 == "GH" || optval1 == "GR" || optval1 == "HK" || optval1 == "IN" || optval1 == "ID" || optval1 == "IR" || optval1 == "IT" || optval1 == "JP" || optval1 == "JO" || optval1 == "KE" || optval1 == "KR" || optval1 == "KW" || optval1 == "LB" || optval1 == "LY" || optval1 == "MY" || optval1 == "MV" || optval1 == "MT" || optval1 == "MU" || optval1 == "MA" || optval1 == "NZ" || optval1 == "NG" || optval1 == "OM" || optval1 == "PK" || optval1 == "PH" || optval1 == "QA" || optval1 == "RU" || optval1 == "SA" || optval1 == "SC" || optval1 == "SG" || optval1 == "ZA" || optval1 == "LK" || optval1 == "SD" || optval1 == "CH" || optval1 == "SY" || optval1 == "TZ" || optval1 == "TH" || optval1 == "TN" || optval1 == "TR" || optval1 == "UG" || optval1 == "AE" || optval1 == "GB" || optval1 == "YE") {
        document.getElementById("mobileNumber_short_1").style.display = "none";
        document.getElementById("mobileNumber_long_1").style.display = "block";
    }
    if (optval2 == "CA" || optval2 == "US") {
        document.getElementById("mobileNumber_short_2").style.display = "block";
        document.getElementById("mobileNumber_long_2").style.display = "none";
    }
    if (optval2 == "AU" || optval2 == "AT" || optval2 == "BH" || optval2 == "BD" || optval2 == "BR" || optval2 == "CN" || optval2 == "CO" || optval2 == "CI" || optval2 == "CY" || optval2 == "DK" || optval2 == "EG" || optval2 == "ET" || optval2 == "FR" || optval2 == "DE" || optval2 == "GH" || optval2 == "GR" || optval2 == "HK" || optval2 == "IN" || optval2 == "ID" || optval2 == "IR" || optval2 == "IT" || optval2 == "JP" || optval2 == "JO" || optval2 == "KE" || optval2 == "KR" || optval2 == "KW" || optval2 == "LB" || optval2 == "LY" || optval2 == "MY" || optval2 == "MV" || optval2 == "MT" || optval2 == "MU" || optval2 == "MA" || optval2 == "NZ" || optval2 == "NG" || optval2 == "OM" || optval2 == "PK" || optval2 == "PH" || optval2 == "QA" || optval2 == "RU" || optval2 == "SA" || optval2 == "SC" || optval2 == "SG" || optval2 == "ZA" || optval2 == "LK" || optval2 == "SD" || optval2 == "CH" || optval2 == "SY" || optval2 == "TZ" || optval2 == "TH" || optval2 == "TN" || optval2 == "TR" || optval2 == "UG" || optval2 == "AE" || optval2 == "GB" || optval2 == "YE") {
        document.getElementById("mobileNumber_short_2").style.display = "none";
        document.getElementById("mobileNumber_long_2").style.display = "block";
    }
    if (optval3 == "CA" || optval3 == "US") {
        document.getElementById("mobileNumber_short_3").style.display = "block";
        document.getElementById("mobileNumber_long_3").style.display = "none";
    }
    if (optval3 == "AU" || optval3 == "AT" || optval3 == "BH" || optval3 == "BD" || optval3 == "BR" || optval3 == "CN" || optval3 == "CO" || optval3 == "CI" || optval3 == "CY" || optval3 == "DK" || optval3 == "EG" || optval3 == "ET" || optval3 == "FR" || optval3 == "DE" || optval3 == "GH" || optval3 == "GR" || optval3 == "HK" || optval3 == "IN" || optval3 == "ID" || optval3 == "IR" || optval3 == "IT" || optval3 == "JP" || optval3 == "JO" || optval3 == "KE" || optval3 == "KR" || optval3 == "KW" || optval3 == "LB" || optval3 == "LY" || optval3 == "MY" || optval3 == "MV" || optval3 == "MT" || optval3 == "MU" || optval3 == "MA" || optval3 == "NZ" || optval3 == "NG" || optval3 == "OM" || optval3 == "PK" || optval3 == "PH" || optval3 == "QA" || optval3 == "RU" || optval3 == "SA" || optval3 == "SC" || optval3 == "SG" || optval3 == "ZA" || optval3 == "LK" || optval3 == "SD" || optval3 == "CH" || optval3 == "SY" || optval3 == "TZ" || optval3 == "TH" || optval3 == "TN" || optval3 == "TR" || optval3 == "UG" || optval3 == "AE" || optval3 == "GB" || optval3 == "YE") {
        document.getElementById("mobileNumber_short_3").style.display = "none";
        document.getElementById("mobileNumber_long_3").style.display = "block";
    }
    if (optval4 == "CA" || optval4 == "US") {
        document.getElementById("mobileNumber_short_4").style.display = "block";
        document.getElementById("mobileNumber_long_4").style.display = "none";
    }
    if (optval4 == "AU" || optval4 == "AT" || optval4 == "BH" || optval4 == "BD" || optval4 == "BR" || optval4 == "CN" || optval4 == "CO" || optval4 == "CI" || optval4 == "CY" || optval4 == "DK" || optval4 == "EG" || optval4 == "ET" || optval4 == "FR" || optval4 == "DE" || optval4 == "GH" || optval4 == "GR" || optval4 == "HK" || optval4 == "IN" || optval4 == "ID" || optval4 == "IR" || optval4 == "IT" || optval4 == "JP" || optval4 == "JO" || optval4 == "KE" || optval4 == "KR" || optval4 == "KW" || optval4 == "LB" || optval4 == "LY" || optval4 == "MY" || optval4 == "MV" || optval4 == "MT" || optval4 == "MU" || optval4 == "MA" || optval4 == "NZ" || optval4 == "NG" || optval4 == "OM" || optval4 == "PK" || optval4 == "PH" || optval4 == "QA" || optval4 == "RU" || optval4 == "SA" || optval4 == "SC" || optval4 == "SG" || optval4 == "ZA" || optval4 == "LK" || optval4 == "SD" || optval4 == "CH" || optval4 == "SY" || optval4 == "TZ" || optval4 == "TH" || optval4 == "TN" || optval4 == "TR" || optval4 == "UG" || optval4 == "AE" || optval4 == "GB" || optval4 == "YE") {
        document.getElementById("mobileNumber_short_4").style.display = "none";
        document.getElementById("mobileNumber_long_4").style.display = "block";
    }
}

function showPhoneForm() {
    var selopt1 = "0";
    var selopt2 = "0";
    var selopt3 = "0";
    var selopt4 = "0";

    if (document.getElementById("number_type_1")) {
        selopt1 = document.getElementById("number_type_1").value;
    }
    if (document.getElementById("number_type_2")) {
        selopt2 = document.getElementById("number_type_2").value;
    }
    if (document.getElementById("number_type_3")) {
        selopt3 = document.getElementById("number_type_3").value;
    }
    if (document.getElementById("number_type_4")) {
        selopt4 = document.getElementById("number_type_4").value;
    }
    if (selopt1 == "1_1") {
        document.getElementById("homeNumber_1").style.display = "none";
        document.getElementById("businessNumber_1").style.display = "none";
        document.getElementById("mobileNumber_1").style.display = "block";
        if (document.getElementById("mobilePrefs_1") != null) {
            document.getElementById("mobilePrefs_1").style.display = "block";
        }
    }
    if (selopt1 == "1_2") {
        document.getElementById("homeNumber_1").style.display = "block";
        document.getElementById("businessNumber_1").style.display = "none";
        document.getElementById("mobileNumber_1").style.display = "none";
        if (document.getElementById("mobilePrefs_1") != null) {
            document.getElementById("mobilePrefs_1").style.display = "none";
        }
    }
    if (selopt1 == "1_3") {
        document.getElementById("homeNumber_1").style.display = "none";
        document.getElementById("businessNumber_1").style.display = "block";
        document.getElementById("mobileNumber_1").style.display = "none";
        if (document.getElementById("mobilePrefs_1") != null) {
            document.getElementById("mobilePrefs_1").style.display = "none";
        }
    }
    if (selopt2 == "2_1") {
        document.getElementById("homeNumber_2").style.display = "none";
        document.getElementById("businessNumber_2").style.display = "none";
        document.getElementById("mobileNumber_2").style.display = "block";
        if (document.getElementById("mobilePrefs_2") != null) {
            document.getElementById("mobilePrefs_2").style.display = "block";
        }
    }
    if (selopt2 == "2_2") {
        document.getElementById("homeNumber_2").style.display = "block";
        document.getElementById("businessNumber_2").style.display = "none";
        document.getElementById("mobileNumber_2").style.display = "none";
        if (document.getElementById("mobilePrefs_2") != null) {
            document.getElementById("mobilePrefs_2").style.display = "none";
        }
    }
    if (selopt2 == "2_3") {
        document.getElementById("homeNumber_2").style.display = "none";
        document.getElementById("businessNumber_2").style.display = "block";
        document.getElementById("mobileNumber_2").style.display = "none";
        if (document.getElementById("mobilePrefs_2") != null) {
            document.getElementById("mobilePrefs_2").style.display = "none";
        }
    }
    if (selopt3 == "3_1") {
        document.getElementById("homeNumber_3").style.display = "none";
        document.getElementById("businessNumber_3").style.display = "none";
        document.getElementById("mobileNumber_3").style.display = "block";
        if (document.getElementById("mobilePrefs_3") != null) {
            document.getElementById("mobilePrefs_3").style.display = "block";
        }
    }
    if (selopt3 == "3_2") {
        document.getElementById("homeNumber_3").style.display = "block";
        document.getElementById("businessNumber_3").style.display = "none";
        document.getElementById("mobileNumber_3").style.display = "none";
        if (document.getElementById("mobilePrefs_3") != null) {
            document.getElementById("mobilePrefs_3").style.display = "none";
        }
    }
    if (selopt3 == "3_3") {
        document.getElementById("homeNumber_3").style.display = "none";
        document.getElementById("businessNumber_3").style.display = "block";
        document.getElementById("mobileNumber_3").style.display = "none";
        if (document.getElementById("mobilePrefs_3") != null) {
            document.getElementById("mobilePrefs_3").style.display = "none";
        }
    }
    if (selopt4 == "4_1") {
        document.getElementById("homeNumber_4").style.display = "none";
        document.getElementById("businessNumber_4").style.display = "none";
        document.getElementById("mobileNumber_4").style.display = "block";
        if (document.getElementById("mobilePrefs_4") != null) {
            document.getElementById("mobilePrefs_4").style.display = "block";
        }
    }
    if (selopt4 == "4_2") {
        document.getElementById("homeNumber_4").style.display = "block";
        document.getElementById("businessNumber_4").style.display = "none";
        document.getElementById("mobileNumber_4").style.display = "none";
        if (document.getElementById("mobilePrefs_4") != null) {
            document.getElementById("mobilePrefs_4").style.display = "none";
        }
    }
    if (selopt4 == "4_3") {
        document.getElementById("homeNumber_4").style.display = "none";
        document.getElementById("businessNumber_4").style.display = "block";
        document.getElementById("mobileNumber_4").style.display = "none";
        if (document.getElementById("mobilePrefs_4") != null) {
            document.getElementById("mobilePrefs_4").style.display = "none";
        }
    }
}




// SWAP OUT A CSS CLASS

function shn_change_class(id, newClass) {
    var elm = document.getElementById(id)
    elm.className = newClass;
}


// CLICKING ON TEXT LABEL TO AUTO SELECT A RADIO BUTTON

//	example code:  onclick="shnCheckedValue(document.forms['ek'].elements['resultsBy'], '3');"
//	ek = name of form
//	resultsBy = name of radio button
//	3 = radio button value

function shnCheckedValue(radioObj, newValue) {
    if (!radioObj)
        return;
    var radioLength = radioObj.length;
    if (radioLength == undefined) {
        radioObj.checked = (radioObj.value == newValue.toString());
        return;
    }
    for (var i = 0; i < radioLength; i++) {
        radioObj[i].checked = false;
        if (radioObj[i].value == newValue.toString()) {
            radioObj[i].checked = true;
        }
    }
}


// SELECT ALL CHECK BOX FUNCTIONALITY (Currently used on 4.7.2)

//	function shn_check_all(checkname, exby) {
//		for (i = 0; i < checkname.length; i++)
//			checkname[i].checked = exby.checked? false:true
//	}	

function toggleCheck(divId, thisCheck) {
    var elementId = document.getElementById(divId)
    if (thisCheck.checked == true) {
        elementId.style.display = "none";
    } else {
        elementId.style.display = "block";
    }
}


// TURN FORM ELEMENTS ON/OFF (Currently used in 4.4, 4.4a, 4.5b)

function basicSwitchItOn(floatingCover, formSelect1, formInput1, thisBox) {
    if (thisBox.checked == true) {
        document.getElementById(floatingCover).style.display = 'none';
        document.getElementById(formSelect1).disabled = false;
        document.getElementById(formInput1).disabled = false;
    } else {
        document.getElementById(floatingCover).style.display = 'block';
        document.getElementById(formSelect1).disabled = true;
        document.getElementById(formSelect1).selectedIndex = 0;
        document.getElementById(formInput1).disabled = true;
        document.getElementById(formInput1).value = '';
    }
}
//ref#SAR - NEERAJ SAGAR
function switchItOn(floatingCover, formSelect1, formInput1, formSelect2, thisBox) {
    if (thisBox.checked == true) {
        document.getElementById(floatingCover).style.display = 'none';
        document.getElementById(formSelect1).disabled = false;
        document.getElementById(formInput1).disabled = false;
        document.getElementById(formSelect2).disabled = false;
    } else {
        document.getElementById(floatingCover).style.display = 'block';
        document.getElementById(formSelect1).disabled = true;
        //document.getElementById(formSelect1).selectedIndex=0;
        document.getElementById(formSelect1).selectedIndex = '';
        document.getElementById(formInput1).disabled = true;
        document.getElementById(formInput1).value = '';
        document.getElementById(formSelect2).disabled = true;
        document.getElementById(formSelect2).selectedIndex = 0;
        if (document.getElementById(formSelect1 + '-suggest') != null)
            document.getElementById(formSelect1 + '-suggest').value = selectAirport
    }
    //IsAllEkOperated('SO');
}


// FLIGHTS BY SCHEDULE CLASS MENU (Currently used on 4.1.1.1)

function styleChange(thisObj, cssStyle, switchOff) {
    var obj = document.getElementById(thisObj);
    if (obj.className == 'detail bonusMiles') {
        obj.className = 'detail bonusMiles' + cssStyle;
    } else if ((obj.className != 'detail classSelected') && (obj.className != 'detail classNewUnavailable')) {
        obj.className = 'detail ' + cssStyle;
    } else if ((obj.className == 'detail classSelected') && switchOff) {
        obj.className = 'detail ' + cssStyle;
    }
}
/*
Author  : Neeraj Sagar
Desc    : Schedule Search : Onclick
 //Connection Split
*/
function getSelected(thisObj, switchOff) {
    var parent = "ctl00_c_CtrlFltResult_ctl00_ctl0"; //parent
    var optionIndex = thisObj.id.substr(32, 1); // Option Index
    var FlightSequenceIndex = thisObj.id.substr(38, 1);
    var classType = thisObj.id.substr(40, 6); //Class(E,B,F),ClassBonus
    var selClass, selBonus, restClassOne, restBonusOne, restClassTwo, restBonusTwo;

    var objHdnEBonus, objHdnBBonus, objHdnFBonus;
    //if((thisObj.className != 'detail classSelected') && (thisObj.className != 'detail classUnavailable')){

    selClass = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + classType);
    selBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + classType + "Bonus");

    objHdnEBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + 'hdnEBonus');
    objHdnBBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + 'hdnBBonus');
    objHdnFBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + 'hdnFBonus');

    if (thisObj.className != 'detail classNewUnavailable') {
        if (classType == 'eClass') {
            restClassOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass");
            restBonusOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass" + "Bonus");
            restClassTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass");
            restBonusTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass" + "Bonus");
        }
        else if (classType == 'bClass') {
            restClassOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass");
            restBonusOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass" + "Bonus");
            restClassTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass");
            restBonusTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass" + "Bonus");
        }
        else if (classType == 'fClass') {
            restClassOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass");
            restBonusOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass" + "Bonus");
            restClassTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass");
            restBonusTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass" + "Bonus");
        }
        if (selClass != null) {
            styleChange(selClass.id, 'classSelected', switchOff);
        }
        if (selBonus != null) {
            styleChange(selBonus.id, 'classSelected', switchOff);
        }
        if (restClassOne != null) {
            styleChange(restClassOne.id, 'classAvailable', switchOff);
        }
        if (restBonusOne != null) {
            //                if(objHdnEBonus !=null && objHdnEBonus.value=="true")
            //                    styleChange(restBonusOne.id,'bonusMiles classAvailable',switchOff);
            //                else if(objHdnBBonus !=null && objHdnBBonus.value=="true")
            //                    styleChange(restBonusOne.id,'bonusMiles classAvailable',switchOff);  
            //                else if(objHdnFBonus !=null && objHdnFBonus.value=="true")
            //                    styleChange(restBonusOne.id,'bonusMiles classAvailable',switchOff);
            //                else
            styleChange(restBonusOne.id, 'classAvailable', switchOff);
        }
        if (restClassTwo != null) {
            styleChange(restClassTwo.id, 'classAvailable', switchOff);
        }
        if (restBonusTwo != null) {
            //                if(objHdnEBonus !=null && objHdnEBonus.value=="true")
            //                    styleChange(restBonusTwo.id,'bonusMiles classAvailable',switchOff);
            //                else if(objHdnBBonus !=null && objHdnBBonus.value=="true")
            //                    styleChange(restBonusTwo.id,'bonusMiles classAvailable',switchOff);  
            //                else if(objHdnFBonus !=null && objHdnFBonus.value=="true")
            //                    styleChange(restBonusTwo.id,'bonusMiles classAvailable',switchOff);
            //                else
            styleChange(restBonusTwo.id, 'classAvailable', switchOff);
        }
    }
}

/*
Author  : Neeraj Sagar
Desc    : Schedule Search : mouseover/mouseout
 //Connection Split
*/
function getClassChange(thisObj, switchOff, cssClass) {
    var parent = "ctl00_c_CtrlFltResult_ctl00_ctl0"; //parent
    var optionIndex = thisObj.id.substr(32, 1); // Option Index
    var classType = thisObj.id.substr(40, 6); //Class(E,B,F),ClassBonus
    var FlightSequenceIndex = thisObj.id.substr(38, 1);
    var selClass, selBonus, restClassOne, restBonusOne, restClassTwo, restBonusTwo;

    var objHdnEBonus, objHdnBBonus, objHdnFBonus;

    selClass = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + classType);
    selBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + classType + "Bonus");

    objHdnEBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + 'hdnEBonus');
    objHdnBBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + 'hdnBBonus');
    objHdnFBonus = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + 'hdnFBonus');

    //if((thisObj.className != 'detail classSelected') && (thisObj.className != 'detail classUnavailable')){                  
    if (classType == 'eClass') {
        restClassOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass");
        restBonusOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass" + "Bonus");
        restClassTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass");
        restBonusTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass" + "Bonus");
    }
    else if (classType == 'bClass') {
        restClassOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass");
        restBonusOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass" + "Bonus");
        restClassTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass");
        restBonusTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "fClass" + "Bonus");
    }
    else if (classType == 'fClass') {
        restClassOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass");
        restBonusOne = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "bClass" + "Bonus");
        restClassTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass");
        restBonusTwo = document.getElementById(parent + optionIndex + "_ctl0" + FlightSequenceIndex + "_" + "eClass" + "Bonus");
    }

    if (cssClass == '') {
        if (selClass != null) {
            styleChange(selClass.id, 'classSelected', switchOff);
        }
        if (selBonus != null) {
            styleChange(selBonus.id, 'classSelected', switchOff);
        }
        if (restClassOne != null) {
            styleChange(restClassOne.id, 'classAvailable', switchOff);
        }
        if (restBonusOne != null) {
            styleChange(restBonusOne.id, 'classAvailable', switchOff);
        }
        if (restClassTwo != null) {
            styleChange(restClassTwo.id, 'classAvailable', switchOff);
        }
        if (restBonusTwo != null) {
            styleChange(restBonusTwo.id, 'classAvailable', switchOff);
        }
    }
    else {
        if (selClass != null) {
            styleChange(selClass.id, cssClass, switchOff);

        }
        if (selBonus != null) {
            styleChange(selBonus.id, cssClass, switchOff);

        }
    }
}

//ref#SKYRL - End - [Source - Atmosphere]
//start Ref#1056 Phone number collection
// JScript File

//start: Phone number collection for Skwards reg, Editing profile, passenger details by Neeraj Joshi
//start without fax
function findLastDVisiblePnmCwF(div) {
    for (i = 3; i > 0; i = i - 1) {
        if (MM_findObj(div + 'div' + i) != null) {
            if (MM_findObj(div + 'div' + i).style.display != 'none') {
                break;
            }
        }
    }
    return i;
}

function VisibleOffPnmCwF(n, div) {
    var objNType1 = document.getElementById(div + 'ddlNumberType1');
    var objNType2 = document.getElementById(div + 'ddlNumberType2');
    var objNType3 = document.getElementById(div + 'ddlNumberType3');

    var objCCode2 = document.getElementById(div + 'ddlCountryCode2');
    var objCCode3 = document.getElementById(div + 'ddlCountryCode3');
    var objACode2 = document.getElementById(div + 'txtAreaCode2');
    var objACode3 = document.getElementById(div + 'txtAreaCode3');
    var objPhone2 = document.getElementById(div + 'txtPhone2');
    var objPhone3 = document.getElementById(div + 'txtPhone3');
    var objMobile2 = document.getElementById(div + 'txtMobile2');
    var objMobile3 = document.getElementById(div + 'txtMobile3');

    if (div == 'ctl00_c_') {
        var objhdn2 = document.getElementById(div + 'hdnNumberType2');
        var objhdn3 = document.getElementById(div + 'hdnNumberType3');



    }

    c = findLastDVisiblePnmCwF(div);
    if (c == n) {
        if (c == 3) {
            VisDisp(div + 'divLnk2', 7);
            VisDisp(div + 'divAdd', 7);

            if (div == 'ctl00_c_' && objhdn2 != null && (objhdn2.value == 'R' || objhdn2.value == 'E'))
                VisDisp(div + 'lnkDD201', 5);
            else
                VisDisp(div + 'lnkDD201', 8);
            //VisDisp(div+'AFS_AD101',8);
            objCCode3.value = objACode3.value = objPhone3.value = objMobile3.value = '';

            if (div == 'ctl00_c_' && objhdn3 != null)
                objhdn3.value = 'R';


        }
        if (c == 2) {
            objCCode2.value = objACode2.value = objPhone2.value = objMobile2.value = '';
            if (objNType1.value == 'Mobile')
                objNType2.value = 'Home';
            else if (objNType1.value == 'Home')
                objNType2.value = 'Mobile';
            else if (objNType1.value == 'Business')
                objNType2.value = 'Mobile';

            if (div == 'ctl00_c_' && objhdn2 != null) {
                objhdn2.value = 'R';

                var _prevVal1 = objNType1.value;
                if (_prevVal1 == "Mobile") {
                    var optnM = document.createElement("OPTION");
                    optnM.text = 'Mobile';
                    optnM.value = 'Mobile';
                    objNType2.options.add(optnM);
                }
                if (_prevVal1 == "Home") {
                    var optnH = document.createElement("OPTION");
                    optnH.text = 'Home';
                    optnH.value = 'Home';
                    objNType2.options.add(optnH);
                }
                if (_prevVal1 == "Business") {
                    var optnB = document.createElement("OPTION");
                    optnB.text = 'Business';
                    optnB.value = 'Business';
                    objNType2.options.add(optnB);
                }
            }
        }
        VisDisp(div + 'div' + c, 5);

        if (MM_findObj(div + 'ddlCountryCode' + (c - 1)).disabled == false)
            MM_findObj(div + 'ddlNumberType' + (c - 1)).disabled = false;
        else
            MM_findObj(div + 'ddlNumberType' + (c - 1)).disabled = true;
    }
    //ENHF - MYB  Start
    $('#' + div + 'ddlNumberType2').find('option').trigger('chosen:updated');
    $('#' + div + 'ddlNumberType3').find('option').trigger('chosen:updated');
    //ENHF - MYB End
    return false;
}

function VisibleOnPnmCwF(n, message, div) {

    var divNames = [];
    var cnt = 1;
    var divs;
    var ntVal1 = ''; var ntval2 = '';
    var bErr = true;
    if (document.getElementsByTagName) {
        divs = document.getElementsByTagName('div')
    }
    else {
        divs = document.all.tags['div'];
    }
    for (var i = 0; i < divs.length; i++) {
        divNames[i] = divs[i].id;
        if ((divNames[i] == (div + 'div1') || divNames[i] == (div + 'div2') || divNames[i] == (div + 'div3')) && MM_findObj(divNames[i]).style.display != 'none') {
            cnt++;
        }
    }
    if (cnt == 3) {
        if (document.getElementById(div + 'ddlNumberType1') != null)
            ntVal1 = document.getElementById(div + 'ddlNumberType1').value;

        if (document.getElementById(div + 'ddlNumberType2') != null)
            ntVal2 = document.getElementById(div + 'ddlNumberType2').value;

        if (ntVal1 != '' && ntVal2 != '' && ntVal1 == ntVal2) {
            alert(message);
            CaptureClientEventTeaLeaf(message);
            return false;
        }
    }
    VisDisp(div + 'div' + cnt, 4);
    showDiv(cnt, div)
    if (cnt == 2) {
        VisDisp(div + 'divLnk2', 7);
        VisDisp(div + 'divAdd', 7);

        VisDisp(div + 'lnkDD201', 8);
        //VisDisp(div+'AFS_AD101',8);

        if (document.getElementById(div + 'hdnNumberType2') != null) {
            if (document.getElementById(div + 'hdnNumberType2').value == 'R')
                document.getElementById(div + 'hdnNumberType2').value = 'A';
        }
        //Removing item from dropdown2

        if (div == 'ctl00_c_') {

            //ENHF MYB Start
            var id = div + 'ddlNumberType2';
            var ddlNumberType2_chosen_id = div + 'ddlNumberType2_chosen';
            var gWidth = $('#' + id).width();
            //WCAG - KhoaTong: begin check if the selector is not null
            var obj = document.getElementById(ddlNumberType2_chosen_id);
            if (typeof obj != 'undefined' && obj != null)
                obj.setAttribute("style", "width:" + gWidth + "px");
            //WCAG - KhoaTong end
            var gWidth1 = $('#' + div + 'ddlCountryCode2').width();
            //WCAG - KhoaTong: begin check if the selector is not null
            var ddlCountryCode2_chosen_id = div + 'ddlCountryCode2_chosen';
            var obj1 = document.getElementById(ddlCountryCode2_chosen_id);
            if (typeof obj1 != 'undefined' && obj1 != null)
                obj1.setAttribute("style", "width:" + gWidth1 + "px");
            //WCAG - KhoaTong end
            //ENHF MYB End

            var menu1 = document.getElementById(div + 'ddlNumberType1');
            var _prevVal1 = menu1.options[menu1.selectedIndex].value;
            var selectmenu = document.getElementById(id);
            var i;
            for (i = selectmenu.options.length - 1; i >= 0; i--) {
                if (selectmenu.options[i].value == _prevVal1) {
                    selectmenu.remove(i);
                }
            }
        }
    }
    if (cnt == 3) {
        //ENHF MYB Start
        var id = div + 'ddlNumberType3';
        var ddlNumberType3_chosen_id = div + 'ddlNumberType3_chosen';
        var gWidth = $('#' + id).width();
        //WCAG - KhoaTong: begin check if the selector is not null
        var object = document.getElementById(ddlNumberType3_chosen_id);
        if (typeof object != 'undefined' && object != null)
            object.setAttribute("style", "width:" + gWidth + "px");
        //WCAG - KhoaTong end
        var gWidth1 = $('#' + div + 'ddlCountryCode3').width();
        //WCAG - KhoaTong: begin check if the selector is not null
        var object1 = document.getElementById(div + 'ddlCountryCode3_chosen');
        if (typeof object1 != 'undefined' && object1 != null)
            object1.setAttribute("style", "width:" + gWidth1 + "px");
        //WCAG - KhoaTong end
        //ENHF MYB End
        VisDisp(div + 'divLnk2', 5);
        VisDisp(div + 'divAdd', 5);
        VisDisp(div + 'divLnk3', 7);
        VisDisp(div + 'lnkDD301', 8);
        if (document.getElementById(div + 'hdnNumberType3') != null) {
            if (document.getElementById(div + 'hdnNumberType3').value == 'R')
                document.getElementById(div + 'hdnNumberType3').value = 'A';
        }
        if (MYBContanctCaller != 'MYB') {
            if (MM_findObj(div + 'ddlNumberType3') != null)
                MM_findObj(div + 'ddlNumberType3').disabled = true;
        }
    }
    //ENHF MYB Start
    $('#' + div + 'ddlNumberType2').find('option').trigger("chosen:updated");
    $('#' + div + 'ddlNumberType3').find('option').trigger("chosen:updated");
    //ENHF MYB End
    return false;
}

function removeOptions(selectbox) {
    var i;
    for (i = selectbox.options.length - 1; i >= 0; i--) {
        if (selectbox.options[i].selected) {
            selectbox.remove(i);
            break;
        }
    }
}

function removeAllOptions(selectbox) {
    var i;
    for (i = selectbox.options.length - 1; i >= 0; i--) {
        selectbox.remove(i);
    }
}

function addOption(selectbox, text, value) {
    var optn = document.createElement("option");
    optn.text = text;
    optn.value = value;
    selectbox.options.add(optn);
}

function showDiv(i, div) {
    var bErr = false;
    var _prevVal1 = ''; var _prevVal2 = ''; var _prevVal3 = '';
    switch (i) {
        case 2:
            if (MM_findObj(div + 'ddlNumberType1') != null && MM_findObj(div + 'ddlNumberType2') != null && MM_findObj(div + 'ddlNumberType3') != null) {
                if (MYBContanctCaller != 'MYB') {
                    MM_findObj(div + 'ddlNumberType1').disabled = true;
                }
                if (document.getElementById(div + 'ddlNumberType1') != null)
                    _prevVal1 = document.getElementById(div + 'ddlNumberType1').value;

                var id = div + 'ddlNumberType2';
                var selectmenu = document.getElementById(id);
                var selectmenu3 = document.getElementById(div + 'ddlNumberType3');
                if (document.getElementById(id) != null && MM_findObj(div + 'div2').style.display != 'none') {
                    if (_prevVal1 == "Mobile") {
                        VisDisp(div + 'txtMobile2', 5);
                        VisDisp(div + 'lblPS_MOB2', 5);
                        if (div == 'ctl00_c_ctPax1_')
                            VisDisp('ctl00_c_ctPax1_AlertHdr2', 5);
                        else if (div == 'ctl00_c_') {
                            VisDisp('ctl00_c_AlertHdr2', 5);
                        }

                        VisDisp(div + 'txtAreaCode2', 4);
                        VisDisp(div + 'txtPhone2', 4);
                        VisDisp(div + 'lblPS_AC2', 4);
                        VisDisp(div + 'lblPS_TEL2', 4);

                        VisDisp(div + 'tddTEL2', 7);
                        VisDisp(div + 'tddAC2', 7);
                        VisDisp(div + 'tdACode2', 7);
                        VisDisp(div + 'tdPhone2', 7);
                        setSelectedIndex(selectmenu, 'Home');
                        setSelectedIndex(selectmenu3, 'Business');

                        VisDisp(div + 'tddMOB2', 5);//WCAG - Thien Vu - fixed UDWA 835
                    }
                    else if (_prevVal1 == "Home" || _prevVal1 == "Business") {
                        VisDisp(div + 'txtMobile2', 4);
                        VisDisp(div + 'lblPS_MOB2', 4);
                        if (div == 'ctl00_c_ctPax1_')
                            VisDisp('ctl00_c_ctPax1_AlertHdr2', 4);
                        else if (div == 'ctl00_c_') {
                            VisDisp('ctl00_c_AlertHdr2', 7);
                        }
                        VisDisp(div + 'txtAreaCode2', 5);
                        VisDisp(div + 'txtPhone2', 5);
                        VisDisp(div + 'lblPS_AC2', 5);
                        VisDisp(div + 'lblPS_TEL2', 5);

                        VisDisp(div + 'tddTEL2', 5);
                        VisDisp(div + 'tddAC2', 5);
                        VisDisp(div + 'tdACode2', 5);
                        VisDisp(div + 'tdPhone2', 5);

                        setSelectedIndex(selectmenu, 'Mobile');
                        if (_prevVal1 == "Home")
                            setSelectedIndex(selectmenu3, 'Business');
                        if (_prevVal1 == "Business")
                            setSelectedIndex(selectmenu3, 'Home');
                    }
                    //					    MM_findObj(div+'ddlCountryCode2').value = '';
                    //						MM_findObj(div+'ddlCountryCode3').value = '';
                    MM_findObj(div + 'txtMobile2').value = '';
                    MM_findObj(div + 'txtMobile3').value = '';
                    MM_findObj(div + 'txtAreaCode2').value = '';
                    MM_findObj(div + 'txtAreaCode3').value = '';
                    MM_findObj(div + 'txtPhone2').value = '';
                    MM_findObj(div + 'txtPhone3').value = '';




                }
            }
            break;
        case 3:
            if (MM_findObj(div + 'ddlNumberType1') != null && MM_findObj(div + 'ddlNumberType2') != null && MM_findObj(div + 'ddlNumberType3') != null) {
                if (MYBContanctCaller != 'MYB') {
                    MM_findObj(div + 'ddlNumberType2').disabled = true;
                    MM_findObj(div + 'ddlNumberType3').disabled = true;
                }
                if (document.getElementById(div + 'ddlNumberType1') != null)
                    _prevVal1 = document.getElementById(div + 'ddlNumberType1').value;
                if (document.getElementById(div + 'ddlNumberType2') != null)
                    _prevVal2 = document.getElementById(div + 'ddlNumberType2').value;
                var id = div + 'ddlNumberType3';
                var selectmenu = document.getElementById(id);
                if (document.getElementById(id) != null && MM_findObj(div + 'div3').style.display != 'none') {
                    if (_prevVal1 == "Mobile" || _prevVal2 == "Mobile") {
                        VisDisp(div + 'txtMobile3', 5);
                        VisDisp(div + 'lblPS_MOB3', 5);
                        if (div == 'ctl00_c_ctPax1_')//IBE
                            VisDisp('ctl00_c_ctPax1_AlertHdr3', 5);
                        else if (div == 'ctl00_c_')//MYB
                        {
                            VisDisp('ctl00_c_AlertHdr3', 5);
                        }
                        VisDisp(div + 'txtAreaCode3', 4);
                        VisDisp(div + 'txtPhone3', 4);
                        VisDisp(div + 'lblPS_AC3', 4);
                        VisDisp(div + 'lblPS_TEL3', 4);

                        VisDisp(div + 'tddTEL3', 7);
                        VisDisp(div + 'tddAC3', 7);
                        VisDisp(div + 'tdACode3', 7);
                        VisDisp(div + 'tdPhone3', 7);

                        VisDisp(div + 'tddMOB3', 5);//WCAG - Thien Vu - fixed UDWA 835
                    }
                    else if (_prevVal1 == "Home" || _prevVal1 == "Business" || _prevVal2 == "Home" || _prevVal2 == "Business") {
                        VisDisp(div + 'txtMobile3', 4);
                        VisDisp(div + 'lblPS_MOB3', 4);
                        if (div == 'ctl00_c_ctPax1_')
                            VisDisp('ctl00_c_ctPax1_AlertHdr3', 4);
                        else if (div == 'ctl00_c_') {
                            VisDisp('ctl00_c_AlertHdr3', 7);
                        }
                        VisDisp(div + 'txtAreaCode3', 5);
                        VisDisp(div + 'txtPhone3', 5);
                        VisDisp(div + 'lblPS_AC3', 5);
                        VisDisp(div + 'lblPS_TEL3', 5);

                        VisDisp(div + 'tddTEL3', 5);
                        VisDisp(div + 'tddAC3', 5);
                        VisDisp(div + 'tdACode3', 5);
                        VisDisp(div + 'tdPhone3', 5);
                    }

                    if (div == 'ctl00_c_') {
                        VisDisp(div + 'divAdd', 5);
                    }

                    if ((_prevVal1 == "Mobile" || _prevVal1 == "Home") && (_prevVal2 == "Mobile" || _prevVal2 == "Home")) {
                        setSelectedIndex(selectmenu, 'Business');
                    }
                    if ((_prevVal1 == "Mobile" || _prevVal1 == "Business") && (_prevVal2 == "Mobile" || _prevVal2 == "Business")) {
                        setSelectedIndex(selectmenu, 'Home');
                    }
                    if ((_prevVal1 == "Home" || _prevVal1 == "Business") && (_prevVal2 == "Home" || _prevVal2 == "Business")) {
                        setSelectedIndex(selectmenu, 'Mobile');
                    }
                }
                //MM_findObj(div+'ddlCountryCode3').value = '';						
                MM_findObj(div + 'txtMobile3').value = '';
                MM_findObj(div + 'txtAreaCode3').value = '';
                MM_findObj(div + 'txtPhone3').value = '';
            }
            break;
    }
}

function showPhoneForm1wF(div) {
    if (MM_findObj(div + 'ddlNumberType1') != null && MM_findObj(div + 'div1').style.display != 'none') {
        var selectmenu2 = document.getElementById(div + 'ddlNumberType2');
        var selectmenu3 = document.getElementById(div + 'ddlNumberType3');
        var selectmenu1 = document.getElementById(div + 'ddlNumberType1');
        var chosenoption1 = selectmenu1.options[selectmenu1.selectedIndex] //this refers to "selectmenu1"

        var hdnNumberType1 = document.getElementById(div + 'hdnNumberType1');
        var hdnNumberType2 = document.getElementById(div + 'hdnNumberType2');
        var hdnNumberType3 = document.getElementById(div + 'hdnNumberType3');

        if (div == 'ctl00_c_') {
            var hdnddlType1 = document.getElementById(div + 'hdnddlType1');
            var hdnddlType2 = document.getElementById(div + 'hdnddlType2');
            var hdnddlType3 = document.getElementById(div + 'hdnddlType3');
        }

        if (chosenoption1.value == "Mobile") {
            document.getElementById(div + 'txtAreaCode1').value = '';
            document.getElementById(div + 'txtPhone1').value = '';
            VisDisp(div + 'txtAreaCode1', 5);
            VisDisp(div + 'txtPhone1', 5);
            VisDisp(div + 'lblPS_AC1', 5);
            VisDisp(div + 'lblPS_TEL1', 5);
            VisDisp(div + 'tddTEL1', 5);
            VisDisp(div + 'tddAC1', 5);
            VisDisp(div + 'tdACode1', 5);
            VisDisp(div + 'tdPhone1', 5);
            VisDisp(div + 'tddMOB1', 4);
            VisDisp(div + 'txtMobile1', 4);
            VisDisp(div + 'lblPS_MOB1', 4);
            if (div == 'ctl00_c_ctPax1_')
                VisDisp('ctl00_c_ctPax1_AlertHdr1', 4);
            else if (div == 'ctl00_c_') {
                VisDisp('ctl00_c_AlertHdr1', 7);
            }

            setSelectedIndex(selectmenu2, 'Home');
            setSelectedIndex(selectmenu3, 'Business');

            if (div == 'ctl00_c_') {
                hdnddlType1.value = 'Mobile';
                //hdnddltype2.value = 'Home';
                //hdnddltype3.value = 'Business';
            }

        }
        else if (chosenoption1.value == "Home" || chosenoption1.value == "Business") {
            document.getElementById(div + 'txtMobile1').value = '';
            VisDisp(div + 'txtMobile1', 5);
            VisDisp(div + 'lblPS_MOB1', 5);
            if (div == 'ctl00_c_ctPax1_')
                VisDisp('ctl00_c_ctPax1_AlertHdr1', 5);
            else if (div == 'ctl00_c_') {
                VisDisp('ctl00_c_AlertHdr1', 5);
            }
            VisDisp(div + 'txtAreaCode1', 4);
            VisDisp(div + 'txtPhone1', 4);
            VisDisp(div + 'lblPS_AC1', 4);
            VisDisp(div + 'lblPS_TEL1', 4);
            VisDisp(div + 'tddTEL1', 7);
            VisDisp(div + 'tddAC1', 7);
            VisDisp(div + 'tdACode1', 7);
            VisDisp(div + 'tdPhone1', 7);

            if (chosenoption1.value == "Home") {
                setSelectedIndex(selectmenu2, 'Mobile');
                setSelectedIndex(selectmenu3, 'Business');

                if (div == 'ctl00_c_') {
                    hdnddlType1.value = 'Home';
                    //hdnddlType2.value = 'Mobile';
                    //hdnddlType3.value = 'Business';
                }
            }
            if (chosenoption1.value == "Business") {
                setSelectedIndex(selectmenu2, 'Mobile');
                setSelectedIndex(selectmenu3, 'Home');
                if (div == 'ctl00_c_') {
                    hdnddlType1.value = 'Business';
                    //hdnddlType2.value = 'Mobile';
                    //hdnddlType3.value = 'Home';
                }
            }

        }
    }
}
function showPhoneForm2wF(div) {
    if (MM_findObj(div + 'ddlNumberType2') != null && MM_findObj(div + 'div2').style.display != 'none') {
        var selectmenu2 = document.getElementById(div + 'ddlNumberType2');
        var chosenoption2 = selectmenu2.options[selectmenu2.selectedIndex]
        if (div == 'ctl00_c_') {
            var hdnddlType1 = document.getElementById(div + 'hdnddlType1');
            var hdnddlType2 = document.getElementById(div + 'hdnddlType2');
            var hdnddlType3 = document.getElementById(div + 'hdnddlType3');
        }
        if (chosenoption2.value == "Mobile") {
            document.getElementById(div + 'txtAreaCode2').value = '';
            document.getElementById(div + 'txtPhone2').value = '';
            VisDisp(div + 'txtAreaCode2', 5);
            VisDisp(div + 'txtPhone2', 5);
            VisDisp(div + 'lblPS_AC2', 5);
            VisDisp(div + 'lblPS_TEL2', 5);
            VisDisp(div + 'tddTEL2', 5);
            VisDisp(div + 'tddAC2', 5);
            VisDisp(div + 'tdACode2', 5);
            VisDisp(div + 'tdPhone2', 5);
            VisDisp(div + 'tddMOB2', 4);
            VisDisp(div + 'txtMobile2', 4);
            VisDisp(div + 'lblPS_MOB2', 4);
            if (div == 'ctl00_c_ctPax1_')
                VisDisp('ctl00_c_ctPax1_AlertHdr2', 4);
            else if (div == 'ctl00_c_') {
                VisDisp('ctl00_c_AlertHdr2', 7);

            }

            if (div == 'ctl00_c_') {
                hdnddlType2.value = 'Mobile';
                //if (hdnddlType1.value == 'Home')
                //    hdnddlType3.value = 'Business';
                //else
                //    hdnddlType3.value = 'Home';
            }
        }
        else if (chosenoption2.value == "Home" || chosenoption2.value == "Business") {
            document.getElementById(div + 'txtMobile2').value = '';
            VisDisp(div + 'txtMobile2', 5);
            VisDisp(div + 'lblPS_MOB2', 5);
            if (div == 'ctl00_c_ctPax1_')
                VisDisp('ctl00_c_ctPax1_AlertHdr2', 5);
            else if (div == 'ctl00_c_') {
                VisDisp('ctl00_c_AlertHdr2', 5);

            }
            VisDisp(div + 'txtAreaCode2', 4);
            VisDisp(div + 'txtPhone2', 4);
            VisDisp(div + 'lblPS_AC2', 4);
            VisDisp(div + 'lblPS_TEL2', 4);
            VisDisp(div + 'tddTEL2', 7);
            VisDisp(div + 'tddAC2', 7);
            VisDisp(div + 'tdACode2', 7);
            VisDisp(div + 'tdPhone2', 7);

            if (div == 'ctl00_c_') {
                if (chosenoption2.value == "Home") {
                    hdnddlType2.value = 'Home';
                    //if (hdnddlType1.value == 'Mobile')
                    //    hdnddlType3.value = 'Business';
                    //else
                    //    hdnddlType3.value = 'Mobile';
                }
                else {
                    hdnddlType2.value = 'Business';
                    //if (hdnddlType1.value == 'Mobile')
                    //    hdnddlType3.value = 'Home';
                    //else
                    //    hdnddlType3.value = 'Mobile';
                }
            }

        }
    }
}
function showPhoneForm3wF(div) {
    if (MM_findObj(div + 'ddlNumberType3') != null && MM_findObj(div + 'div3').style.display != 'none') {
        var selectmenu3 = document.getElementById(div + 'ddlNumberType3');
        var chosenoption3 = selectmenu3.options[selectmenu3.selectedIndex]
        var hdnddlType3 = document.getElementById(div + 'hdnddlType3');
        if (chosenoption3.value == "Mobile") {
            document.getElementById(div + 'txtAreaCode3').value = '';
            document.getElementById(div + 'txtPhone3').value = '';
            VisDisp(div + 'txtAreaCode3', 5);
            VisDisp(div + 'txtPhone3', 5);
            VisDisp(div + 'lblPS_AC3', 5);
            VisDisp(div + 'lblPS_TEL3', 5);
            VisDisp(div + 'tddTEL3', 5);
            VisDisp(div + 'tddAC3', 5);
            VisDisp(div + 'tdACode3', 5);
            VisDisp(div + 'tdPhone3', 5);
            VisDisp(div + 'txtMobile3', 4);
            VisDisp(div + 'lblPS_MOB3', 4);
            if (div == 'ctl00_c_ctPax1_')
                VisDisp('ctl00_c_ctPax1_AlertHdr3', 4);
            else if (div == 'ctl00_c_') {
                VisDisp('ctl00_c_AlertHdr3', 7);
            }

            hdnddlType3.value = 'Mobile';

        }
        else if (chosenoption3.value == "Home" || chosenoption3.value == "Business") {
            document.getElementById(div + 'txtMobile3').value = '';
            VisDisp(div + 'txtMobile3', 5);
            VisDisp(div + 'lblPS_MOB3', 5);
            if (div == 'ctl00_c_')
                VisDisp('ctl00_c_ctPax1_AlertHdr3', 5);
            else if (div == 'ctl00_c_ctPax1_') {
                VisDisp('ctl00_c_AlertHdr3', 5);
            }
            VisDisp(div + 'txtAreaCode3', 4);
            VisDisp(div + 'txtPhone3', 4);
            VisDisp(div + 'lblPS_AC3', 4);
            VisDisp(div + 'lblPS_TEL3', 4);
            VisDisp(div + 'tddTEL3', 7);
            VisDisp(div + 'tddAC3', 7);
            VisDisp(div + 'tdACode3', 7);
            VisDisp(div + 'tdPhone3', 7);

            if (chosenoption3.value == "Home")
                hdnddlType3.value = 'Home';
            else
                hdnddlType3.value = 'Business';

        }
    }
}
function setSelectedIndex(s, v) {
    for (var i = 0; i < s.options.length; i++) {
        if (s.options[i].value == v) {
            s.selectedIndex = i;
            s.options[i].selected = true;
            return;
        }
    }
}
//end without fax
//end: Phone number collection


// JScript File

//start: Phone number collection for Skwards reg, Editing profile, passenger details by Neeraj Joshi
//start without fax
function findLastDVisiblePnmC1(div) {
    for (i = 2; i > 0; i = i - 1) {
        if (MM_findObj(div + 'div' + i) != null) {
            if (MM_findObj(div + 'div' + i).style.display != 'none') {
                break;
            }
        }
    }
    return i;
}

function VisibleOffPnmC1(n, div) {
    var objCCode2 = document.getElementById(div + 'ddlCountryCode2');
    var objACode2 = document.getElementById(div + 'txtAreaCode2');
    var objPhone2 = document.getElementById(div + 'txtPhone2');

    c = findLastDVisiblePnmC1(div);
    if (c == n) {
        if (c == 2) {
            VisDisp(div + 'divAdd', 7);
            //	        VisDisp(div+'AFS_AD101',8);
            objCCode2.value = objACode2.value = objPhone2.value = '';
        }
        VisDisp(div + 'div' + c, 5);
        MM_findObj(div + 'ddlNumberType' + (c - 1)).disabled = false;
    }
    return false;
}

function VisibleOnPnmC1(n, message, div) {

    var divNames = [];
    var cnt = 1;
    var divs;
    var ntVal1 = ''; var ntval2 = '';
    var bErr = true;
    if (document.getElementsByTagName) {
        divs = document.getElementsByTagName('div')
    }
    else {
        divs = document.all.tags['div'];
    }
    for (var i = 0; i < divs.length; i++) {
        divNames[i] = divs[i].id;
        if ((divNames[i] == (div + 'div1') || divNames[i] == (div + 'div2') || divNames[i] == (div + 'div3')) && MM_findObj(divNames[i]).style.display != 'none') {
            cnt++;
        }
    }
    VisDisp(div + 'div' + cnt, 4);
    showDiv1(cnt, div)
    if (cnt == 2) {
        if (MYBContanctCaller != 'MYB') {
            if (MM_findObj(div + 'ddlNumberType2') != null)
                MM_findObj(div + 'ddlNumberType2').disabled = true;
        }
        VisDisp(div + 'lnkDD201', 8);
        VisDisp(div + 'divAdd', 5);
    }
    return false;
}

function showDiv1(i, div) {
    var bErr = false;
    var _prevVal1 = '';

    if (MM_findObj(div + 'ddlNumberType1') != null && MM_findObj(div + 'ddlNumberType2') != null) {
        if (MYBContanctCaller != 'MYB') {
            MM_findObj(div + 'ddlNumberType1').disabled = true;
        }
        if (document.getElementById(div + 'ddlNumberType1') != null)
            _prevVal1 = document.getElementById(div + 'ddlNumberType1').value;

        var id = div + 'ddlNumberType2';
        var selectmenu = document.getElementById(id);
        if (document.getElementById(id) != null && MM_findObj(div + 'div2').style.display != 'none') {
            if (_prevVal1 == "Fax")
                setSelectedIndex(selectmenu, 'Business');
            if (_prevVal1 == "Business")
                setSelectedIndex(selectmenu, 'Fax');
        }
    }

}

function showPhoneForm1(div) {
    if (MM_findObj(div + 'ddlNumberType1') != null && MM_findObj(div + 'ddlNumberType2') != null && MM_findObj(div + 'div1').style.display != 'none') {
        var selectmenu2 = document.getElementById(div + 'ddlNumberType2');
        var selectmenu1 = document.getElementById(div + 'ddlNumberType1');
        var chosenoption1 = selectmenu1.options[selectmenu1.selectedIndex]
        if (chosenoption1.value == "Business")
            setSelectedIndex(selectmenu2, 'Fax');

        else if (chosenoption1.value == "Fax")
            setSelectedIndex(selectmenu2, 'Business');
    }
}
//end with fax
//end Phone number collection
//end:Ref#1056 Phone number collection=======
//Function to check if the Name contains valid characters
function isValidName(parm) {
    var regEx = /^[^\[\]\\\^\$\.\|\?\*\+\(\)\{\}_%#@!;:~`=<>,/&"]+$/;
    ///^[a-zA-Z'-]+$/;
    return parm.match(regEx);
}
//Function to check if the Last Name contains valid characters
function isValidLastName(parm) {
    var regEx = /^[^\[\]\\\^\$\.\|\?\*\+\(\)\{\}\-\s\d_'%#@!;:~`=<>,/&"]+$/;
    ///^[a-zA-Z'-]+$/;
    return parm.match(regEx);
}


//Async Call to Save Pax info
var html1;
function PushFFAPDL(cntpax) {

    var objAgreedEnroll = MM_findObj('chkTITOC');
    if (objAgreedEnroll != null && objAgreedEnroll.checked == true) {
        var objVar = document.getElementById('watp_hdnPIDTI');
        if (typeof dataLayer != "undefined") {
            dataLayer.push({
                'event': 'EventTrigger.TravelInsurance_agreedToEnrollTI',
                'category': 'Travel Insurance',
                'action': 'Agreed To Enroll Insurance',
                'label': ((typeof objVar !== 'undefined') ? objVar.value : 'Guest-IBE'),
                'value': 0
            });
        }
    }
    for (i = 1; i <= cntpax; i++) {
        var objFFNo = MM_findObj('ctl00_c_ctPax' + i + '_txtFFNo');
        var objFFAP = MM_findObj('ctl00_c_ctPax' + i + '_ddlAirlineProg');

        if (typeof objFFNo != "undefined" && typeof objFFAP != "undefined") {
            if (objFFNo != null && objFFAP != null) {
                if (Trim(objFFNo.value).length > 0 && (objFFAP.value != '0' && objFFAP.value != 'none')) {
                    if ((Trim(objFFNo.value).length >= 9 || Trim(objFFNo.value).length <= 13) && Trim(objFFAP.value).toUpperCase() == 'EK') {
                        if (typeof dataLayer != "undefined") {
                            dataLayer.push({
                                'event': 'EventTrigger.Common_skywardsLinked',
                                'category': 'Skywards Linked',
                                'action': 'IBE',
                                'label': 'EK|' + objFFNo.value,
                                'value': 0
                            });
                        }
                    }
                }
            }
        }
    }
}

function GetAsynCall(reqFor, ibePath) {

    //       //Validate Email & Confirm Email       
    var objEmail = MM_findObj('ctl00_c_Cont_txtEmail');
    //var objRemail = MM_findObj('ctl00_c_ctPax1_txtreEmail');
    var objFName = MM_findObj('ctl00_c_ctPax1_txtFirstName');
    var objLName = MM_findObj('ctl00_c_ctPax1_txtLastName');
    var objTitle = MM_findObj('ctl00_c_ctPax1_PS_TITLED');
    var objName;

    var emailChk = true;
    if (objEmail != null) {

        if (isEmail(Trim(objEmail.value)) == false) {
            emailChk = false;
            // break;
        }

    }
    else {
        objEmail = '';
    }


    if (objTitle != null && objFName != null && objLName != null) {
        objName = objTitle.value + '/' + objFName.value + '/' + objLName.value;
        objName = objName.replace(new RegExp("'", 'g'), "~$~"); //objName.replace("'","#$$#");   
    }

    //debugger; 
    if (emailChk == true)
    // if(emailChk == true)
    {//alert(MM_findObj("ctl00_hdnPaxInfo").value); 
        html1 = $.ajax({
            context: document.body,
            url: ibePath + '/IBE/CtrlGenIBE.aspx?RequestFor=' + reqFor + '&Email=' + objEmail.value + '&Name=' + objName, /*IBESplit*/
            async: true
        });
    }
}
// Async Call to Save Pax info - End

/* ======================= */
/* Accordion functionality */
/* ======================= */


function OpenCloseTC() {
    if ($('#tcAccordion:visible').length == 0) {
        $("#tcAccordion").show();
        $("#dvTandC").addClass('termsOpened');
    }
    else {
        $("#tcAccordion").hide();
        $("#dvTandC").removeClass('termsOpened');
    }
}

function Accordion(trigger, content, states, settings) {
    this.trigger = $(trigger);
    this.content = $(content);
    this.speed = 'normal';
    this.speed = (settings && settings.speed) ? settings.speed : 'normal';
    this.parentActive = (settings && settings.parentActive) ? true : false;
    var states = (states) ? states : {};
    this.classes = {
        idle: (states.idle) ? states.idle : '',
        active: (states.active) ? states.active : 'termsOpened'
    };
    this.init();
    return this;
};
Accordion.prototype.init = function () {
    var _this = this;
    this.content.show().data({
        'height': _this.getBoxSize(this.content).height,
        'paddingTop': _this.getBoxSize(this.content).paddingTop,
        'paddingBottom': _this.getBoxSize(this.content).paddingBottom,
        'marginTop': _this.getBoxSize(this.content).marginTop,
        'marginBottom': _this.getBoxSize(this.content).marginBottom
    }).height(0).css({ 'margin-top': 0, 'margin-bottom': 0, 'padding-top': 0, 'padding-bottom': 0 }).hide();
    this.content.children().each(function () {
        var child = $(this);
        child.data({
            'paddingTop': _this.getBoxSize(child).paddingTop,
            'paddingBottom': _this.getBoxSize(child).paddingBottom,
            'marginTop': _this.getBoxSize(child).marginTop,
            'marginBottom': _this.getBoxSize(child).marginBottom
        }).css({ 'margin-top': 0, 'margin-bottom': 0, 'padding-top': 0, 'padding-bottom': 0 });
    });
    this.trigger.css('cursor', 'pointer').bind('click', function () {
        var src = (_this.parentActive) ? $(this).parent() : $(this);
        if (!src.hasClass(_this.classes.active)) {
            _this.showItem(_this.content);
        }
        else {
            _this.hideItem(_this.content);
        }
    });
};
Accordion.prototype.getInnerHeight = function (element) {
    var element = $(element);
    if (element.children().length <= 0) return element.outerHeight(true);
    var tempHeight = 0;
    element.children().each(function () {
        tempHeight += $(this).outerHeight(true);
    });
    return tempHeight;
};
Accordion.prototype.getBoxSize = function (element) {
    return {
        height: parseInt($(element).outerHeight(true)),
        paddingTop: parseInt($(element).css('padding-top')),
        paddingBottom: parseInt($(element).css('padding-bottom')),
        marginTop: $(element).css('margin-top'),
        marginBottom: $(element).css('margin-bottom')
    };
};
Accordion.prototype.isAnimating = function (item) {
    return item.is(':animated');
};
Accordion.prototype.showItem = function (item) {
    var _this = this;
    if (this.isAnimating(item)) return;
    item.show().animate({
        'height': item.data('height'),
        'padding-top': item.data('paddingTop'),
        'padding-bottom': item.data('paddingBottom'),
        'margin-top': (item.data('marginTop').toLowerCase() == 'auto') ? 0 : item.data('marginTop'),
        'margin-bottom': (item.data('marginBottom').toLowerCase() == 'auto') ? 0 : item.data('marginBottom')
    }, _this.speed, function () {
        if (!_this.parentActive)
            _this.trigger.removeClass(_this.classes.idle).addClass(_this.classes.active);
        else
            _this.trigger.parent().removeClass(_this.classes.idle).addClass(_this.classes.active);
    });
    item.children().each(function () {
        var child = $(this);
        child.animate({
            'padding-top': child.data('paddingTop'),
            'padding-bottom': child.data('paddingBottom'),
            'margin-top': (child.data('marginTop').toLowerCase() == 'auto') ? 0 : child.data('marginTop'),
            'margin-bottom': (child.data('marginBottom').toLowerCase() == 'auto') ? 0 : child.data('marginBottom')
        }, _this.speed);
    });
};
Accordion.prototype.hideItem = function (item) {
    var _this = this;
    if (this.isAnimating(item)) return;
    item.animate({
        'height': 0,
        'padding-top': 0,
        'padding-bottom': 0,
        'margin-top': 0,
        'margin-bottom': 0
    }, _this.speed, function () {
        item.hide();
        if (!_this.parentActive)
            _this.trigger.removeClass(_this.classes.active).addClass(_this.classes.idle);
        else
            _this.trigger.parent().removeClass(_this.classes.active).addClass(_this.classes.idle);
    });
    item.children().each(function () {
        var child = $(this);
        child.animate({
            'padding-top': 0,
            'padding-bottom': 0,
            'margin-top': 0,
            'margin-bottom': 0
        }, _this.speed);
    });
};

function fnError(ControlId, Message, ShowDivMsg, SetFocus, errorPanelSubClass, MessageKey, SetDivMsgFocus, HandlePlaceholder) {
    var errControl;
    ShowDivMsg = ShowDivMsg || false;
    SetFocus = SetFocus || true;
    SetDivMsgFocus = SetDivMsgFocus || false;
    HandlePlaceholder = HandlePlaceholder || "Y";
    sErrorText = '#spErrorText';

    //Setting message
    Message = Message || fnGetError(MessageKey);
    if (Message == '') {
        Message = fnGetError(MessageKey);
    }

    //MY There is an error : (declaration)
    try {
        Message = "<span id='sHLErrorsText' tabindex='0'>" + $(sErrorText)[0].innerHTML + "</span><br/> " + Message;
    } catch (e) { }

    fnResetError();
    try {
        if (ControlId != '' && (typeof (errControl) == 'undefined' || errControl == null)) {
            errControl = MM_findObj(ControlId);
            //Check if control exists else show message in div
            if ($(errControl).length > 0) {
                $(errControl).addClass("error");
                if (SetFocus) {
                    $(errControl).focus();
                }
            }
            else {
                ShowDivMsg = true;
            }

            try {
                //Associated Label highlight error
                var ALabel = $("label[for='" + errControl.id + "']");
                if (ALabel.length) {
                    ALabel.addClass.addClass("error");
                }
            } catch (e) { }
        }
        else {
            ShowDivMsg = true;
        }

        //WaterMark Message details
        if ($(errControl).is('input:text')) {
            // $(errControl).attr("placeholder", Message);

            ////Message details for auto suggest textboxes
            //if (ControlId.indexOf('-suggest') >= 0) {
            //    $(errControl).attr("value", Message);
            //}
        }

    } catch (e) {
        ShowDivMsg = true;
    }

    if (ShowDivMsg || ControlId == '') {
        var errMbox;
        if (typeof errorPanelSubClass == "undefined" || errorPanelSubClass == null || errorPanelSubClass == "") {
            $(".errorPanel").removeClass("warningMessage");
            $(".errorPanel").removeClass("greenText");
            errMbox = $(".errorPanel").first();
            $(errMbox).append(Message);
        }
        else {
            if (errorPanelSubClass == "warningMessage") {
                $(".errorPanel").addClass(errorPanelSubClass);
                $(".errorPanel").addClass("greenText");
                errMbox = $(".errorPanel" + "." + errorPanelSubClass + "." + "greenText");
                divMessage = "<span class='warning-icon'></span><span>" + Message + "</span>";
                $(errMbox).html(divMessage);
            }
            else {
                $(".errorPanel").removeClass("warningMessage");
                $(".errorPanel").removeClass("greenText");
                errMbox = $(".errorPanel" + "." + errorPanelSubClass);
                $(errMbox).append(Message);
            }
        }

        $(errMbox).show();
        $(errMbox).attr("visibility", "visible");
        $(errMbox).css("visibility", "visible");
        $(errMbox).focus();
    }

    try {
        if (SetDivMsgFocus) {
            var smboxHeight = 0;
            if ($('.ts-sc__wrapper--fixed').length) {
                smboxHeight = $('.ts-sc__wrapper--fixed').outerHeight() + 10;
            }
            $('html, body').animate({
                scrollTop: $(".errorPanel").offset().top - smboxHeight
            }, "slow");
        }
    } catch (e) { }

    if (HandlePlaceholder == "Y") {
        InitiatePlaceHolder(true);
    }
    try {
        var GAFormName = 'IBE_Form';
        GAFormName = $('#watp_formName').val();

        if (typeof ($('#watp_skyFormName')) != 'undefined' && $('#watp_skyFormName') != null && $('#watp_skyFormName').val() != "" && $('#watp_skyFormName').val() != undefined)
            GAFormName = $('#watp_skyFormName').val();

        if (typeof ($('#watp_modifyFormName')) != 'undefined' && $('#watp_modifyFormName') != null && $('#watp_modifyFormName').val() != "" && $('#watp_modifyFormName').val() != undefined)
            GAFormName = $('#watp_modifyFormName').val();

        var GAErrorCode = 'Client:' + GAFormName + ':' + MessageKey;

        PushErrorCodes(GAFormName, GAErrorCode);
    }
    catch (e) {
    }

    //Tealeaf --  Client error implementation
    try {
        var TLFormName = 'IBE_Form';
        TLFormName = $('#watp_formName').val();
        var clientValidation = {
            Cerrorheader: TLFormName,
            Cerrorcode: MessageKey,
            Cerrordesc: Message
        };
        subtype = "ClientValidationEvent";
        TeaLeaf.Event.tlAddCustomEvent(subtype, clientValidation);
    }
    catch (e) {
    }
}

function fnResetError() {
    var errMbox = $(".errorPanel");
    errMbox.empty();
    errMbox.hide();

    $(".error").removeClass("error");
    Clearplaceholder();
}

function fnGetError(ErrorKey) {
    try {
        var ErrList = $('#hdnErrorList'),
            oErrList = jQuery.parseJSON(ErrList.val()),
            sError = oErrList[ErrorKey];
        if (typeof sError == "undefined" || sError == null || sError == "") {
            //Generic error implementation
            sError = oErrList["IBE0000"];
            if (typeof sError == "undefined" || sError == null || sError == "") {
                return ErrorKey;
            }
            else {
                sError = sError + " -- " + ErrorKey;
            }
        }
        return sError;
    } catch (e) {
        return ErrorKey + "*";
    }
}

var Errors = {
    selectors: {
        sErrorClickKey: '#spErrorClickKey',
        sErrorList: '#hdnShowError',
        clErrorPanel: '.errorPanel, .ts-server-errors',
        clwarningMessage: '.warningMessage',
        clgreenText: '.greenText',
        shdnErrorList: '#hdnErrorList',
        clerror: '.error',
        sErrorText: '#spErrorText',
        sErrorsText: '#spErrorsText',
        errorPanel: '.errorPanel, .ts-server-errors'
    },
    Add: function (ControlId, Message, MessageKey, containerId, bHighlightOnly, ValidationType, GTMKey) {//WCAG s732822 added containerId
        var self = this,
            $ErrorList = $(this.selectors.sErrorList),
            DatalayerList,
            MessageList,
            ControlList,
            ALableVal = '';
        containerId = containerId || '',
            bHighlightOnly = bHighlightOnly || false,
            ValidationType = ValidationType || '';
        GTMKey = GTMKey || '';
        if ($ErrorList.length != 0) {
            if ($ErrorList.val() != "") {
                DatalayerList = jQuery.parseJSON($ErrorList.val());
                MessageList = DatalayerList.Mlist;
                ControlList = DatalayerList.Clist;
            }
            else {
                DatalayerList = {};
                MessageList = [];
                ControlList = [];
            }

            $ErrorPanel = $(this.selectors.clErrorPanel);
            var errControl;

            //Setting message
            if (!bHighlightOnly) {
                try {
                    if (ValidationType != '' && ControlId != '') {
                        Message = $('#' + ControlId).attr('data-' + ValidationType + '-msg');
                    }
                } catch (e) { }
                Message = Message || self.getMessage(MessageKey);
                if (Message == '') {
                    Message = self.getMessage(MessageKey);
                }
            }
            self.ResetClass();


            var errMbox;

            if (ControlId != '') {
                try {
                    var ALabeltxt = '';
                    var fsetText = '';
                    var isSkipColon = false;
                    try {
                        if (ControlId != "ts_txtFullName") {
                            if ($('#' + ControlId).parents('fieldset').find('legend:first').find('span.readCustomErrorLegend').length > 0) {  //#PSP2 - readCustomErrorLegend implementation
                                fsetText = $('#' + ControlId).parents('fieldset').find('legend:first').find('span.readCustomErrorLegend').text();
                            }
                            else {
                                fsetText = $('#' + ControlId).parents('fieldset').find('legend:first').text();//WCAG S732822 added ":first" to legend
                            }

                            if (fsetText.length > 0) {
                                fsetText = fsetText.replace('*', '').trim() + ": ";//WCAG KhoaTong remove white space to fix jira 1827
                                isSkipColon = true;
                            }
                        }
                        else {
                            fsetText = $('#' + ControlId).parents('fieldset').find('.visually-hidden.fullname').text();//WCAG S732822 added ":first" to legend

                            //if (fsetText.length > 0) {
                            //    fsetText = fsetText.replace('*', '').trim() + ": ";//WCAG KhoaTong remove white space to fix jira 1827
                            //}
                        }
                        // jira 3987
                        if (fsetText.length > 0) {
                            if (!isSkipColon)
                                fsetText = fsetText.replace('*', '').trim();

                            if ($('#' + ControlId).is('[ek-err-ignore-legend]')) {
                                fsetText = "<span class='visually-hidden' aria-hidden='true'>" + fsetText + " </span>";
                            }
                            else {

                                if (!isSkipColon)
                                    fsetText = fsetText + ": ";
                            }
                        }
                        // jira3987
                    } catch (e) { }

                    try {//WCAG S732822 begin support custom error label, e.g in termNCondition
                        var ALabel = $("label[for='" + ControlId + "']");
                        ALabeltxt = ALabel.text();
                        ALabeltxt = Trim(ALabeltxt.replace('*', ''));
                        var customErrorLabel = ALabel.find('span.readCustomErrorLabel');
                        if (typeof customErrorLabel != "undefined" && customErrorLabel != null && customErrorLabel.text().length > 1) {
                            var customErrorLabelTxt = customErrorLabel.text();
                            ALabeltxt = customErrorLabelTxt.charAt(0).toUpperCase() + customErrorLabelTxt.substring(1) + ": ";
                        }
                        else if (ALabeltxt.length > 0) {
                            ALabeltxt = ALabeltxt.trim() + ": ";//WCAG KhoaTong remove white space to fix jira 1827
                        }
                        //WCAG S732822 end support custom error label, e.g in termNCondition
                    } catch (e) { }
                    if (!bHighlightOnly) {
                        MessageList.push(fsetText + ALabeltxt + "<span id='err_" + MessageKey + "_" + ControlId + "'>" + Message + "</span> ");
                    }
                } catch (e) {
                    if (!bHighlightOnly) {
                        MessageList.push("<span id='err_" + MessageKey + "_" + ControlId + "'>" + Message + "</span> ");
                    }
                }
                //WCAG s732822 Begin
                if (containerId != '') {
                    ControlList.push(containerId);
                }
                else {
                    ControlList.push(ControlId);
                }
                //WCAG s732822 End

                //var adiv = document.createElement('div');
                //var aTag = document.createElement('a');
                //var cid = ControlId.id;
                //aTag.setAttribute('href', '#');
                //aTag.setAttribute('onclick', 'Errors.FocusControl("' + ControlId + '"); return false;');
                //aTag.setAttribute('data-access-error', '200');
                //aTag.setAttribute('aria-describedby', "err_" + MessageKey + "_" + ControlId);
                //try {
                //    if ($(this.selectors.sErrorClickKey).length > 0) {
                //        aTag.innerHTML = $(this.selectors.sErrorClickKey)[0].innerHTML;
                //    }
                //} catch (e) {
                //    aTag.innerHTML = "Click here<span class='label-hidden'>to go to error</span>";
                //}
                //adiv.appendChild(aTag);
                //ControlList.push(ControlId);
                //MessageList.push("<span id='err_" + MessageKey + "_" + ControlId + "'>" + Message + "</span>  + adiv.innerHTML);
            }
            else {
                if (!bHighlightOnly) {
                    MessageList.push(Message);
                }
            }

            if (bHighlightOnly) {
                if (containerId != '') {
                    ControlList.push(containerId);
                }
                else {
                    ControlList.push(ControlId);
                }
            }
            //$ErrorList.val($ErrorList.val() + Message);
            //$ErrorList.val($ErrorList.val() + " ");
            //$ErrorList.val($ErrorList.val() + aTag.outerHTML);

            DatalayerList.Mlist = MessageList;
            DatalayerList.Clist = ControlList;
            $ErrorList.val(JSON.stringify(DatalayerList));
            try {
                if (!bHighlightOnly) {
                    var GAFormName = 'IBE_Form';
                    GAFormName = $('#watp_formName').val();

                    if (typeof ($('#watp_skyFormName')) != 'undefined' && $('#watp_skyFormName') != null && $('#watp_skyFormName').val() != "")
                        GAFormName = $('#watp_skyFormName').val();
                    if ($('#hdnWATPPaymentType').length > 0 && typeof $('#hdnWATPPaymentType').val() != 'undefined' && $('#hdnWATPPaymentType').val() != '')
                        GAFormName = GAFormName + '_' + $('#hdnWATPPaymentType').val();
                    // to get Form Name for MYB payment page
                    if (MYBAPP == 'MYB') {
                        GAFormName = GTM_MybFormName;

                        if (typeof ($('#watp_skyFormName')) != 'undefined' && $('#watp_skyFormName') != null && $('#watp_skyFormName').val() != "")
                            GAFormName = $('#watp_skyFormName').val();
                    }
                    var GAErrorCode = 'Client:' + GAFormName + ':' + MessageKey;

                    //if (MessageKey == "" && GTMKey != "")
                    //    GAErrorCode = 'Client:' + GAFormName + ':' + GTMKey;

                    if (MessageKey == "" && GTMKey != "") {
                        if (GTMKey.indexOf('PCIDSS') != -1) {
                            var splitGTMKey = GTMKey.split('||');
                            if (splitGTMKey.length > 0) {
                                GAErrorCode = splitGTMKey[1];
                            }
                        }
                        else
                            GAErrorCode = 'Client:' + GAFormName + ':' + GTMKey;
                    }

                    PushSystemErrorCodes(GAErrorCode);
                }
            }
            catch (e) {
            }

            //Tealeaf --  Client error implementation
            try {
                var TLFormName = 'IBE_Form';
                TLFormName = $('#watp_formName').val();
                var clientValidation = {
                    Cerrorheader: TLFormName,
                    Cerrorcode: MessageKey,
                    Cerrordesc: Message
                };
                subtype = "ClientValidationEvent";
                TeaLeaf.Event.tlAddCustomEvent(subtype, clientValidation);
            }
            catch (e) {
            }
        }
    },
    show: function (errorPanelSubClass, HandlePlaceholder, Headinglevel, Animate) {
        try {
            var self = this,
                $ErrorList = $(this.selectors.sErrorList),
                DatalayerList,
                MessageHTML,
                errControl;

            self.Reset();
            errorPanelSubClass = errorPanelSubClass || '';
            HandlePlaceholder = HandlePlaceholder || "Y";
            Headinglevel = Headinglevel || 2;
            Animate = Animate || 'Y';
            if ($ErrorList.length != 0) {
                if ($ErrorList.val() != "") {
                    DatalayerList = jQuery.parseJSON($ErrorList.val());
                    try {
                        $(DatalayerList.Clist).each(function (i, ControlId) {
                            if (ControlId != '') {
                                errControl = '#' + ControlId;
                                //Check if control exists else show message in div
                                if ($(errControl).length > 0) {
                                    $(errControl).addClass("error");
                                }

                                try {
                                    //Associated Label highlight error
                                    var ALabel = $("label[for='" + ControlId + "']");
                                    if (ALabel.length) {
                                        $(ALabel).addClass("error");
                                    }
                                } catch (e) {
                                    console.log(e.message);
                                }
                            }
                        });
                    } catch (e) { }

                    try {
                        MessageHTML = "";
                        if ($(this.selectors.sErrorText).length > 0) {
                            if ($(DatalayerList.Mlist).length == 1) {
                                MessageHTML = MessageHTML + "<span id='sHLErrorsText' tabindex='0' role='heading' aria-level='" + Headinglevel + "'>" + $(this.selectors.sErrorText)[0].innerHTML + "</span>";
                            }
                            else {
                                MessageHTML = MessageHTML + "<span id='sHLErrorsText' tabindex='0' role='heading' aria-level='" + Headinglevel + "'>" + $(this.selectors.sErrorsText)[0].innerHTML + "</span>";
                            }
                        }
                    } catch (e) { }

                    MessageHTML = MessageHTML + "<ul>";
                    $(DatalayerList.Mlist).each(function (i, Message) {
                        if (Message != '') {
                            MessageHTML = MessageHTML + "<li>" + Message + "</li>";
                        }
                    });
                    MessageHTML = MessageHTML + "</ul>";
                    if ($ErrorList.val() != '') {
                        if (typeof errorPanelSubClass == "undefined" || errorPanelSubClass == null || errorPanelSubClass == "") {
                            $(".errorPanel").removeClass("warningMessage");
                            $(".errorPanel").removeClass("greenText");
                            errMbox = $(".errorPanel, .ts-server-errors").first();
                            $(errMbox).append(MessageHTML);
                        }
                        else {
                            if (errorPanelSubClass == "warningMessage") {
                                $(".errorPanel").addClass(errorPanelSubClass);
                                $(".errorPanel").addClass("greenText");
                                errMbox = $(".errorPanel" + "." + errorPanelSubClass + "." + "greenText");
                                divMessage = "<span class='warning-icon'></span><span>" + MessageHTML + "</span>";
                                $(errMbox).html(divMessage);
                            }
                            else {
                                $(".errorPanel").removeClass("warningMessage");
                                $(".errorPanel").removeClass("greenText");
                                errMbox = $(".errorPanel" + "." + errorPanelSubClass + ", .ts-server-errors" + "." + errorPanelSubClass);
                                $(errMbox).append(MessageHTML);
                            }
                        }
                        $ErrorList.val('');
                        $(errMbox).show();
                        $(errMbox).attr("visibility", "visible");
                        $(errMbox).css("visibility", "visible");
                        $(errMbox).focus();

                        try {
                            if (Animate == "Y") {
                                var smboxHeight = 0;
                                if ($('.ts-sc__wrapper--fixed').length) {
                                    smboxHeight = $('.ts-sc__wrapper--fixed').outerHeight() + 10;
                                }
                                $('html, body').animate({
                                    scrollTop: $(".errorPanel, .ts-server-errors").offset().top - smboxHeight
                                }, "slow", function () {
                                    $("#sHLErrorsText").focus();
                                });
                            }
                        } catch (e) { }
                    }
                }
            }
        } catch (e) {
            console.log("Errors failed: " + e.message);
        }
        if (HandlePlaceholder == "Y") {
            InitiatePlaceHolder(true);
        }
    },
    getMessage: function (MessageKey) {
        try {
            return window[MessageKey];
            var ErrList = $(this.selectors.shdnErrorList),
                oErrList = jQuery.parseJSON(ErrList.val()),
                sError = oErrList[ErrorKey];
            if (typeof sError == "undefined" || sError == null || sError == "") {
                //Generic error implementation
                sError = oErrList["IBE0000"];
                if (typeof sError == "undefined" || sError == null || sError == "") {
                    return ErrorKey;
                }
                else {
                    sError = sError + " -- " + ErrorKey;
                }
            }
            return sError;
        } catch (e) {
            return ErrorKey + "*";
        }
    },
    Reset: function myfunction() {
        //Hide the error panel
        var errMbox = $(this.selectors.clErrorPanel);
        errMbox.empty();
        errMbox.hide();
    },
    ResetClass: function () {
        //Clear errors class from input fields
        $(this.selectors.clerror).removeClass("error");
        Clearplaceholder();
    },
    FocusControl: function (ControlId) {

        $('html, body').animate({
            scrollTop: $("#" + ControlId).offset().top
        }, "slow");
        $("#" + ControlId).focus();
    },
    FocusError: function () {
        var $errorPanel = $(this.selectors.errorPanel);

        if ($errorPanel.length > 0) {
            $errorPanel.focus();
        }
    }
};

function Clearplaceholder() {
    if (!placeholderIsSupported()) {
        try {
            $('[placeholder]').each(function () {
                var input = $(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            });
        }
        catch (e) {
        }
    }
}
function InitiatePlaceHolder(isError) {
    if (!placeholderIsSupported()) {
        try {

            isError = isError || false;

            $('[placeholder]').focus(function () {
                var input = $(this);
                //if (input.attr('type') == 'password') {
                //    input.unbind("blur");
                //    return;
                //}
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('hasPlaceholder');
                }
            }).blur(function () {
                var input = $(this);
                //if (input.attr('type') == 'password') {
                //    return;
                //}
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.addClass('hasPlaceholder');
                    input.val(input.attr('placeholder'));
                }
            })

            if (isError) {
                $('[placeholder]').each(function () {
                    if (!$(this).hasClass('error')) $(this).blur();
                });
            }
            else
                $('[placeholder]').blur();
        }
        catch (e) {
        }
    }
}
function placeholderIsSupported() {
    var test = document.createElement('input');
    return ('placeholder' in test);
}

// ENHF: Support The IE9 & IE8 Browser placeHolder JIRA:3716 - Start
function InitiateAutoSuggestPlaceHolder(id) {
    try {

        if (!placeholderIsSupported()) {
            $("input[id='" + id + "']").each(function () {
                var input = $(this);
                if (input.val() == '' && input.prev().val() == '') {
                    input.addClass('autoPlaceholder');
                    input.addClass('hasPlaceholder');
                    input.val(input.attr('placeholder'));
                }
            })
            $("input[id='" + id + "']").focus(function () {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('hasPlaceholder');
                }
            })
            $("input[id='" + id + "']").blur(function () {
                $(".autoPlaceholder").each(function () {
                    var input = $(this);
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                        input.addClass('hasPlaceholder')
                    }
                    else { input.removeClass('hasPlaceholder'); }
                });
            });
        }
    } catch (e) { }
}// ENHF: Support The IE9 & IE8 Browser placeHolder JIRA:3716 -End
//MY + S732822 Start
function fnOverridemain() {
    var _self = $('#mainContentOverride');
    //Check is element exists
    if (_self.length < 1) {
        //Get element by class
        var _self = $('.mainContentOverride');
    }
    $(_self).parents("#mainContentAccess").removeAttr("role");
    $(_self).parents("#mainContentAccess").attr("id", "");
    $(_self).attr("id", "mainContentAccess");
    $(_self).attr("role", "main");
}

//MY + S732822 End

function checkStrInArray(str, arr) {
    for (i = 0; i < arr.length; i++) {
        if (str.indexOf(arr[i]) > -1) {
            return true;
        }
    }
    return false;
}

//Bang: apply add open new window for IBE-MYB-SME system.
function fnAutoGenerateOpenNewWindow() {
    //WCAG s732822 Begin fix adding New Window to link
    var openNewWindowLinks_blank = $('a:not([target="_self"],[target=""],[target="_top"],[target="_parent"])');
    var newWindowContentStr = $.trim($('#newWindowContent').text());

    var arr_fn = ["openHotelsNCars", "openSkyLinks", "openSkyPwdLinks", "EkAdvEmailOpen"];//WCAG s732822 jira 3319
    var arr_href = ["javascript:void(0)", "javascript:;"];

    $.each(arr_fn, function (index, value) {
        var openNewWindowLinks_onclick = $('a[onclick*="' + value + '"]');
        if (openNewWindowLinks_onclick.length > 0) {
            $(openNewWindowLinks_onclick).each(function (index) {
                if (typeof $(this).attr('title') == 'undefined' || (typeof $(this).attr('title') != 'undefined' && $(this).attr('title').toLowerCase() == $(this).text().toLowerCase()))
                    $(this).append('<span class="visually-hidden">-' + newWindowContentStr + '</span>');
                if (typeof $(this).attr('title') != 'undefined')
                    $(this).attr('title', $(this).attr('title') + ' -' + newWindowContentStr);
            });
        }
    });

    if (openNewWindowLinks_blank.length > 0) {
        $(openNewWindowLinks_blank).each(function (index) {
            if ($(this).hasClass('no_need_newwindow'))
                return;
            if ($(this).attr('onclick')) {
                if (
                    checkStrInArray($(this).attr('onclick'), arr_fn)
                ) {
                    return;
                }
            }
            if (typeof $(this).attr('href') != 'undefined' && (checkStrInArray($(this).attr('href'), arr_href) || $(this).attr('href') == "#" || $(this).attr('href') == ""))
                return;
            var termChkBox = $(this).parent().prev().find('input:checkbox');
            if ((typeof termChkBox.attr('id') == 'undefined' || termChkBox.attr('id').indexOf('chkAgreeToTerms') < 0) && (typeof $(this).attr('title') == 'undefined' || (typeof $(this).attr('title') != 'undefined' && $(this).attr('title').toLowerCase() == $(this).text().toLowerCase()) || typeof $(this).find('img').attr('alt') != 'undefined')) {
                $(this).append('<span class="visually-hidden">-' + newWindowContentStr + '</span>');
            }
            if (typeof $(this).attr('title') != 'undefined')
                $(this).attr('title', $(this).attr('title') + ' -' + newWindowContentStr);
        });
    }
    //WCAG s732822 End fix adding New Window to link
}
//WCAG-Bang: end

//WebChat - Start
//WebChat Status Listener
function fnWebChatListener() {
    try {
        var d = { "e": "loaded" };
        // "addEventListener" is for standards-compliant web browsers and "attachEvent" is for IE Browsers.
        var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
        var eventer = window[eventMethod];
        var cdata;
        var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
        var chatstarttime;
        // Listen to message from parent window
        eventer(messageEvent, function (e) {

            try {
                if (window._genesys.widgets.extensions) {
                    var wbChatPlugin = window._genesys.widgets.bus.registerPlugin('MyPlugin');

                    // ChatStarted == WebChatService.started
                    wbChatPlugin.subscribe('WebChatService.started', function (e) {
                        var status = 'WebChat$.ChatStarted';
                        $('#hdn_WebChat_Status').val(status);
                        fnUpdateWCSession(status);
                        var now = new Date();
                        chatstarttime = now.getTime();
                        fnUpdateChatStartTime(chatstarttime)
                        fnWebChatTagging(status, chatstarttime);
                    });

                    // ChatEndedClient == WebChatService.ended
                    wbChatPlugin.subscribe('WebChatService.ended', function (e) {
                        var status = 'WebChat$.ChatEndedClient';
                        $('#hdn_WebChat_Status').val(status);
                        fnUpdateWCSession(status);
                        fnWebChatTagging(status, chatstarttime);
                    });

                    // ChatEndedOnError == WebChatService.error
                    wbChatPlugin.subscribe('WebChatService.error', function (e) {
                        var status = 'WebChat$.ChatEndedOnError';
                        $('#hdn_WebChat_Status').val(status);
                        fnUpdateWCSession(status)
                        fnWebChatTagging(status, chatstarttime);
                    });

                    // ChatWindowClosed == WebChat.closed
                    wbChatPlugin.subscribe('WebChat.closed', function (e) {
                        var status = 'WebChat$.ChatWindowClosed';
                        $('#hdn_WebChat_Status').val(status);
                        fnUpdateWCSession(status)
                        fnWebChatTagging(status, chatstarttime);
                    });
                }
                else if (e.data != null) {
                    $('#hdn_WebChat_Status').val(e.data);
                    if (e.data == 'WebChat$.ChatPromtLoaded' || e.data == 'WebChat$.GotoChatForm' || e.data == 'WebChat$.ChatStarted' || e.data == 'WebChat$.ChatEndedClient' || e.data == 'WebChat$.ChatEndedOnError' || e.data == 'WebChat$.ChatWindowClosed' || e.data == 'WebChat$.ChatPromtClosed') {
                        fnUpdateWCSession(e.data)
                    }
                    if (e.data == 'WebChat$.ChatStarted') {
                        $.cookie("webChatStarted", true, { path: '/', domain: window.location.hostname.substring(window.location.hostname.lastIndexOf(".", window.location.hostname.lastIndexOf(".") - 1) + 1) });
                        var now = new Date();
                        chatstarttime = now.getTime();
                        fnUpdateChatStartTime(chatstarttime)
                    }
                    if (e.data == 'WebChat$.ChatEndedClient' || e.data == 'WebChat$.ChatEndedOnError' || e.data == "WebChat$.ChatWindowClosed") {
                        $.cookie("webChatStarted", null, { path: '/', domain: window.location.hostname.substring(window.location.hostname.lastIndexOf(".", window.location.hostname.lastIndexOf(".") - 1) + 1) });
                        fnWebChatTagging(e.data, chatstarttime);
                    }
                    else {
                        fnWebChatTagging(e.data, 0);
                    }
                    if (e.data == 'WebChat$.ChatPromtLoaded') {
                        setFocusWebChat(e.data);
                    }
                }
            }
            catch (e) { }

        }, false);
    }
    catch (e) { }

}
function fnWebChatTagging(event, starttime) {
    try {

        var triggerType = $('#hdnWebChatErrorCode').val();
        var chatContinuedFrom = $('#hdnWebChatFrom').val();
        if (event == 'WebChat$.ChatWindowClosed' || event == 'WebChat$.ChatPromtClosed') {
            $('#hdnWebChatErrorCode').val('');
        }
        if (event == 'WebChat$.ChatPromtLoaded') {
            if (chatContinuedFrom != '') {
                $('#hdnWebChatFrom').val('');
            }
            $('#hdnWebChatStarted').val('N');
            if (MYBAPP == 'MYB' && MYBIsPaymentPage == "Y") {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB Payment Page',
                    Value3: 'WebChat Offered'
                };
                var subtype = 'WebChat_Offered';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'MYB') {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB PNR Login Page',
                    Value3: 'WebChat Offered'
                };
                var subtype = 'WebChat_Offered';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'OLCI') {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'OLCI Flightinfo Page',
                    Value3: 'WebChat Offered'
                };
                var subtype = 'WebChat_Offered';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'Payment Details',
                    Value3: 'WebChat Offered'
                };
                var subtype = 'WebChat_Offered';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
        }

        if (event == 'WebChat$.ChatPromtStartChat') {

            $('#hdnWebChatStarted').val('N');
            if (MYBAPP == 'MYB' && MYBIsPaymentPage == "Y") {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB Payment Page',
                    Value3: 'WebChat Accepted Invite'
                };
                var subtype = 'WebChat_Accepted_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'MYB') {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB PNR Login Page',
                    Value3: 'WebChat Accepted Invite'
                };
                var subtype = 'WebChat_Accepted_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'OLCI') {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'OLCI FlightInfo Page',
                    Value3: 'WebChat Accepted Invite'
                };
                var subtype = 'WebChat_Accepted_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'Payment Details',
                    Value3: 'WebChat Accepted Invite'
                };
                var subtype = 'WebChat_Accepted_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
        }
        if (event == 'WebChat$.ChatPromtNoThanks') {
            $('#hdnWebChatStarted').val('N');
            if (MYBAPP == 'MYB' && MYBIsPaymentPage == "Y") {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB Payment Page',
                    Value3: 'WebChat Rejected Invite'
                };
                var subtype = 'WebChat_Rejected_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'MYB') {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB PNR Login Page',
                    Value3: 'WebChat Rejected Invite'
                };
                var subtype = 'WebChat_Rejected_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'OLCI') {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'OLCI FlightInfo Page',
                    Value3: 'WebChat Rejected Invite'
                };
                var subtype = 'WebChat_Rejected_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'Payment Details',
                    Value3: 'WebChat Rejected Invite'
                };
                var subtype = 'WebChat_Rejected_Invite';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
        }

        if (event == 'WebChat$.ChatFormLoaded') {
            $('#hdnWebChatStarted').val('N');
        }
        if (event == 'WebChat$.ChatNotAvailable') {
            $('#hdnWebChatStarted').val('N');
        }
        if (event == 'WebChat$.GotoChatForm') {
            $('#hdnWebChatStarted').val('N');
            if (MYBAPP == 'MYB' && MYBIsPaymentPage == "Y") {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB Payment Page',
                    Value3: 'WebChat Initiated'
                };
                var subtype = 'WebChat_Initiated';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'MYB') {
                var EventValues = {
                    Value1: "WebChat",
                    Value2: "MYB PNR Login Page",
                    Value3: "WebChat Initiated"
                };
                var subtype = "WebChat_Initiated";
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'OLCI') {
                var EventValues = {
                    Value1: "WebChat",
                    Value2: "OLCI FlightInfo Page",
                    Value3: "WebChat Initiated"
                };
                var subtype = "WebChat_Initiated";
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else {
                var EventValues = {
                    Value1: "WebChat",
                    Value2: "Payment Details",
                    Value3: "WebChat Initiated"
                };
                var subtype = "WebChat_Initiated";
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
        }
        if (event == 'WebChat$.ChatFomrNoThanks') {
            $('#hdnWebChatStarted').val('N');
            if (MYBAPP == 'MYB' && MYBIsPaymentPage == "Y") {
                var EventValues = {
                    Value1: 'WebChat',
                    Value2: 'MYB Payment Page',
                    Value3: 'WebChat Abandoned'
                };
                var subtype = 'WebChat_Abandoned';
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'MYB') {
                var EventValues = {
                    Value1: "WebChat",
                    Value2: "MYB PNR Login Page",
                    Value3: "WebChat Abandoned"
                };
                var subtype = "WebChat_Abandoned";
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else if (MYBAPP == 'OLCI') {
                var EventValues = {
                    Value1: "WebChat",
                    Value2: "OLCI FlightInfo Page",
                    Value3: "WebChat Abandoned"
                };
                var subtype = "WebChat_Abandoned";
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
            else {
                var EventValues = {
                    Value1: "WebChat",
                    Value2: "Payment Details",
                    Value3: "WebChat Abandoned"
                };
                var subtype = "WebChat_Abandoned";
                TeaLeaf.Event.tlAddCustomEvent(subtype, EventValues);
            }
        }

        if (event == 'WebChat$.ChatStarted') {
            $('#hdnWebChatStarted').val('Y');

        }

        if (event == 'WebChat$.ChatEndedClient' || event == 'WebChat$.ChatEndedOnError') {

            if (starttime == '' || starttime == undefined)
                starttime = $('#hdnWebChatStartTime').val();

            var endTime = new Date();
            endchatstamp = endTime.getTime();
            duration = endchatstamp - starttime;
            var ms = duration,
                min = (ms / 1000 / 60) << 0,
                sec = (ms / 1000) % 60;
            var elapsedTime = Math.floor(min) + ' mins ' + Math.floor(sec) + ' secs';
            $('#hdnWebChatErrorCode').val('');
        }
    }
    catch (e) { }
}
var td;
function WebChatAsync(WCURL, WCStatus, WCJson, WCPages, WCCurrentPage) {
    setTimeout(function () {
        fnCallWebChatJS(WCURL, WCStatus, WCJson, WCPages, WCCurrentPage);
    }, 0);
}
function fnchatreason() {
    var chatreason = "";
    try {
        if ($('#hdnWebChatErrorCode') && $('#hdnWebChatErrorCode').val().length > 0) {
            chatreason = $('#hdnWebChatErrorCode').val();
        }
    }
    catch (e) { }
    return chatreason;
}
function fnCallWebChatJS(WCURL, WCStatus, WCJson, WCPages, WCCurrentPage) {
    try {
        if (WCCurrentPage && WCPages.indexOf(WCCurrentPage) > -1) {
            if (WCStatus && (WCStatus == 'WCEligible' || WCStatus == 'WebChat$.GotoChatForm' || WCStatus == 'WebChat$.ChatStarted')) {
                td = WCJson;
                var chatData = {
                    apiUrl: WCURL,
                    chatDiv: "div.chatDiv",
                    triggerType: 'System',
                    triggeredReason: fnchatreason()
                };
                openChatButton(chatData);
            }
        }
    }
    catch (e) { }
}

//For Accessibility
function setFocusWebChat(WCStatus) {
    try {
        if ($('#chatBlock').length > 0) {
            $('.chatDiv').attr('role', 'alert');
            var iframe = $("#chatBlock")[0];
            iframe.contentWindow.focus();
            //iframe.title = 'Web chat is loading';            
            //$('#chatDiv').attr('aria-hidden', false);
            $('#ltWebChatAudio').attr('aria-hidden', false);
            //iframe.title = 'frame Web chat is loading';            
        }
    }
    catch (e) { }
}


//To update the web chat session value
function fnUpdateWCSession(WCStatus) {
    try {
        var wsurl = $('#hdnAjaxURL').val();
        //Set postdata
        var pdata = {};
        pdata['WCStatus'] = WCStatus;
        //var postData = "WCStatus=" + WCStatus;
        var postData = JSON.stringify(pdata);

        $.ajax({
            context: document.body,
            url: wsurl + '&RequestFor=updatewcstatus',
            async: true,
            type: "POST",
            data: postData
        });
    }
    catch (e) { }
}

function fnUpdateChatStartTime(startTime) {

    try {
        var wsurl = $('#hdnAjaxURL').val();
        //Set postdata
        var postData = "WCStartTime=" + startTime;

        $.ajax({
            context: document.body,
            url: wsurl + '&RequestFor=updatewcstarttime',
            async: true,
            data: postData
        });
    }
    catch (e) { }
}
//WebChat - End
function ClearShoppingcart(legId) {
    if (legId == null || typeof legId == 'undefined' || legId == 1) {
        $('.ts-sc').removeClass('ts-sc--update ts-sc--selected').addClass('ts-sc--is-empty');
        $('.ts-sc__footer').hide();
        $('.ts-sc__empty').removeAttr('style');
        $('[data-ts-aa-proxy="totalFlights"]').removeClass('ts-hide').addClass('ts-hide');
        $('[data-ts-aa-proxy="totalFlights"]').prev('p').remove();
        $('.ts-sc__flights').html($('.ts-sc__flights_clone').html());
    }
    else {
        var flightCount = $('.ts-sc__flights .ts-fs').length;
        for (legIndex = legId; legIndex <= flightCount; legIndex++) {
            $('.ts-sc__flights .ts-fs[data-leg^="leg-' + legIndex + '"]').remove();
            $('[id$="dvShopingCart"] .flightDetails [data-leg^="leg-' + legIndex + '"]').remove();
        }

        //EK.comp.ShoppingCart.prototype.reinit();
        //var flightsPerRow = $('.ts-sc__flights .ts-fs').length > 4 ? 4 : $('.ts-sc__flights .ts-fs').length;
        //var outer = $('.ts-sc__not-empty');
        //outer.width(flightsPerRow * 255 + (flightsPerRow + 1) * 16 + 1);
        //var widthOuter = outer.width();
        //var widthFlightContainer = $('.ts-sc__flights').outerWidth();
        //outer.width(widthOuter + (widthOuter - widthFlightContainer));
        //EK.comp.ShoppingCart.prototype.destroy($('[data-ts-comp="ShoppingCart"]'));
        //EK.comp.ShoppingCart.prototype.constructor($('[data-ts-comp="ShoppingCart"]'));


    }

}


/* Vinh Cao - Script for SessionTimeout */
var SessionTimeoutAlarm = {
    selector: {
        fareFamiliesModalOverlay: '.fareFamiliesModalOverlay',
        jsModalOverlay: '.session-timeout-overlay',
        containerFixedSessionTimeout: '.container-fixed-session-timeout',
    },

    timeLeftForWarning: 30,
    sessionCountDown: null,
    elementFocused: null,

    Init: function () {
        var self = this,
            isEnable = $('#SessionTimeout').attr('enable'),
            warningtime = Number($('#SessionTimeout').attr('warningtime'))
            ;

        if (isNum(warningtime)) {
            self.timeLeftForWarning = warningtime;
        }

        if (isEnable == "true") {
            $(document).keyup(function (e) {
                if (e.keyCode == 27) {
                    self.HideSessionTimeout();
                }
            });

            $(document).ajaxStop(function () {
                self.DisableSessionCountDown();
                self.EnableSessionCountDown();
            });

            $(self.selector.containerFixedSessionTimeout).find('strong')
                .children('span.number')
                .html(self.timeLeftForWarning);

            $(self.selector.containerFixedSessionTimeout).find('.js-modal-session-close')
                .unbind('click')
                .click(function (e) {
                    self.HideSessionTimeout();
                })
                .keydown(function (event) {
                    if (event.keyCode == 9) {
                        $('#btnExtendSession').focus();
                        return false;
                    }
                })
                ;

            $('#btnExtendSession').unbind('click').click(function () {
                self.ExtendSession();
                self.HideSessionTimeout();
            });

            self.EnableSessionCountDown();
        }
    },

    EnableSessionCountDown: function () {
        var self = this,
            sessiontimeout = Number($('#SessionTimeout').val()),
            expirytime = new Date()
            ;

        expirytime.setSeconds(expirytime.getSeconds() + sessiontimeout);

        clearTimeout(self.sessionCountDown);
        loopSessionCountDown = function () {
            var now = new Date(),
                nowstamp = now.getTime() / 1000,
                expirystamp = expirytime.getTime() / 1000,
                timer = 5000
                ;

            if (Math.ceil(expirystamp - nowstamp) <= self.timeLeftForWarning) {
                self.ShowSessionTimeout(Math.ceil(expirystamp - nowstamp));
                clearTimeout(self.sessionCountDown);
            } else {
                self.sessionCountDown = setTimeout(loopSessionCountDown, timer);
            }
        }

        loopSessionCountDown();
    },

    DisableSessionCountDown: function () {
        if (this.sessionCountDown != null) {
            clearTimeout(this.sessionCountDown);
        }
    },

    ExtendSession: function () {
        var url = '/refreshsession.aspx/refresh',
            self = this,
            currentURL = window.location.href
            ;

        if (currentURL.indexOf('/MAB/') > -1) {
            url = '/MAB' + url;
        } else if (currentURL.indexOf('/CAB/') > -1) {
            url = '/CAB' + url;
        } else if (currentURL.indexOf('/CKIN/') > -1) {
            url = '/CKIN' + url;
        } else {
            url = '/CAB' + url;
        }

        $.ajax({
            type: "POST",
            url: url,
            contentType: "application/json",
            global: false,
            success: function (msg) {
                if (msg.d == "True") {
                    var re = window.location.pathname;
                    window.location.href = '/CAB/SessionTimeout.aspx?re=' + re;
                } else {
                    self.EnableSessionCountDown();
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
    },

    timerRepeat: null,
    ShowSessionTimeout: function (timeleft) {
        var self = this;
        var jsModalOverlay = $(self.selector.jsModalOverlay);
        var containerFixedSessionTimeout = $(self.selector.containerFixedSessionTimeout);

        // Prevent page from scrolling
        $('html, body').addClass('body-overflow');

        if (jsModalOverlay.is(':hidden')) {
            jsModalOverlay.fadeIn('fast');
        }

        if (containerFixedSessionTimeout.is(':hidden')) {
            containerFixedSessionTimeout.fadeIn('fast');
            jsModalOverlay.css('zIndex', containerFixedSessionTimeout.css('zIndex') - 1);
        }

        self.TimerCountDown(timeleft);
        self.elementFocused = $(':focus').get(0);

        // this function fix issue 2950 - #2
        var loopCountDown = function () {
            var timeleft = $('.text-modal.text-modal-blck').find('.number').html();

            $('#dynamic-message-countdown').find('.number').html(timeleft);

            if (timeleft > 0) {
                $('#dataMessageContainer')
                    .text('')
                    .text($('#dynamic-message-countdown').text());
            }
            if (self.timerCountDown == null) {
                clearTimeout(self.timerRepeat);
            } else {
                self.timerRepeat = setTimeout(loopCountDown, 5000);
            }
        }

        loopCountDown();

        setTimeout(function () {
            $('#modalTitle1').focus();
        }, 300);
    },

    HideSessionTimeout: function () {
        var self = this;
        var jsModalOverlay = $(self.selector.jsModalOverlay);
        var containerFixedSessionTimeout = $(self.selector.containerFixedSessionTimeout);

        if (jsModalOverlay.is(':visible')) {
            jsModalOverlay.fadeOut('fast');
        }

        if (containerFixedSessionTimeout.is(':visible')) {
            containerFixedSessionTimeout.fadeOut('fast');
        }

        clearTimeout(self.timerCountDown);
        clearTimeout(self.timerRepeat);

        // Allow page scrolling
        $('html, body').removeClass('body-overflow');

        $(self.elementFocused).focus();
    },

    timerCountDown: null,
    TimerCountDown: function (timeleft) {
        var self = this,
            spanNumber = $(self.selector.containerFixedSessionTimeout).find('strong.timeleft').children('span.number'),
            count = timeleft
            ;

        var loopCountDown = function () {
            if (count >= 0) {
                spanNumber.html(count);
            }

            if (count < 0) {
                spanNumber.html("0");
            }

            if (count <= 0) {
                clearTimeout(self.timerCountDown);
                self.timerCountDown = null;
                return;
            } else {
                count--;
                self.timerCountDown = setTimeout(loopCountDown, 1000);
            }
        }

        loopCountDown();
    },
}
/* Vinh Cao - End */

function focusCurrTab(el) {
    var currTab = $(el);
    currTab.attr('tabindex', 0).focus().blur(function () {
        currTab.removeAttr('tabindex')
    });
}

function focusSelectedLink(el1, el2) {
    if ($(el1).is(':visible'))
        $(el1).focus();
    else
        $(el2).focus();
}

var AltImage = {
    selector: {
        altSrc: 'alt-src',
    },
    LoadNext: function (e) {
        try {
            var AltList = $(e).attr(this.selector.altSrc);
            var AltJson = $.parseJSON(AltList);
            if (AltJson.length > 0) {
                var newSrc = AltJson[0];
                AltJson.splice(0, 1);
                AltList = JSON.stringify(AltJson);
                e.setAttribute(this.selector.altSrc, AltList);
                $(e).attr('src', newSrc);
            }
        } catch (e) {
            console.log(e.message);
        }
    }
};

var GlobalMain = {
    selector: {
        servDateTime: '',
        clientDateTime: ''
    },

    getEventTimeDiff: function () { // diff in milliseconds
        try {
            var clientDateTime = $('#hdnServDateTime').attr('client-DateTime');  // Client Date on page load
            var clientCurrentDateTime = this.getCurrDateTime(); // Current Date while RQ/RS called
            var TimeDiff = this.getDateDiff(clientDateTime, clientCurrentDateTime);
            return TimeDiff;
        }
        catch (e) {
            return "";
        }
    },
    getServerTime: function () {
        try {
            var servDateTime = $('#hdnServDateTime').val();
            servDateTime = servDateTime.split(',');
            var clientDateTime = $('#hdnServDateTime').attr('client-DateTime');
            var servDatetime = new Date((new Date(servDateTime[0], servDateTime[1], servDateTime[2], servDateTime[3], servDateTime[4], servDateTime[5], servDateTime[6])).getTime() +
                this.getDateDiff(clientDateTime, this.getCurrDateTime()));
            return servDatetime;

        } catch (e) {
            return "";
        }
    },
    getCurrDateTime: function () {
        var currDateTime = new Date();
        return currDateTime;
        //return ((currDateTime.getMonth() + 1) + '/' + currDateTime.getDate() + '/' +  + ' ' + currDateTime.getHours() + ':' + currDateTime.getMinutes() + ':' + currDateTime.getSeconds() + '.' + currDateTime.getMilliseconds());
    },
    getDateTimeServerSide: function (toFormatDate) {
        var currDateTime = new Date(toFormatDate);
        return (currDateTime.getFullYear() + '-' + this.getTwodigitNum((currDateTime.getMonth() + 1)) + '-' + this.getTwodigitNum(currDateTime.getDate()) + ' ' + this.getTwodigitNum(currDateTime.getHours()) + ':' + this.getTwodigitNum(currDateTime.getMinutes()) + ':' + this.getTwodigitNum(currDateTime.getSeconds()) + '.' + currDateTime.getMilliseconds());
    },
    getTwodigitNum: function (toFormat) {
        var rtrn = toFormat < 9 ? ('0' + toFormat) : toFormat;
        return rtrn;
    },
    getDateDiff: function (oldDateTime, newDateTime) {

        // Convert both dates to milliseconds
        //var x = new Date("2017","00","23","10","15","39","521");x;x.getTime();
        var old_date_obj = (new Date(oldDateTime)).getTime();
        var new_date_obj = (new Date(newDateTime)).getTime();

        // Calculate the difference in milliseconds
        var difference_ms = Math.abs(new_date_obj - old_date_obj)


        return difference_ms;
    }

};

var Loader = {
    selector: {
        LoaderText: 'LoaderText',
        MYBLoader: '.MYB-Loader,.IBE-Loader',
        NoText: '.MYB-Loader .No-Text,.IBE-Loader .No-Text',
        WithText: '.MYB-Loader .with-text, .IBE-Loader .with-text',
        hUpdating: '#hUpdating',
        labelNoText: 'hUpdatingOnly',
        labelWithText: 'hUpdating ltWait1'
    },
    Show: function (caller) {
        try {
            var ALoaderText = "";
            try {
                ALoaderText = $(caller).attr(this.selector.LoaderText);
                ALoaderText = ALoaderText || "";
                if (ALoaderText == "") {
                    ALoaderText = $('#' + caller).attr(this.selector.LoaderText);
                }
            } catch (e) {
                console.log(e.message);
            }
            ALoaderText = ALoaderText || "";
            if (ALoaderText != "") {
                $(this.selector.hUpdating).text(ALoaderText);
                $(this.selector.MYBLoader).attr("aria-labelledby", this.selector.labelWithText);
                $(this.selector.WithText).show();
                $(this.selector.NoText).hide();
            }
            else {
                $(this.selector.MYBLoader).attr("aria-labelledby", this.selector.labelNoText);
                $(this.selector.WithText).hide();
                $(this.selector.NoText).show();
            }
            $(this.selector.MYBLoader).show();
        } catch (ex) {
            console.log(ex.message);
        }
    },
    Hide: function () {
        $(this.selector.MYBLoader).hide();
        $(this.selector.WithText).hide();
        $(this.selector.NoText).show();
    }
}

var IBEAsync = {
    skey: function () {
        try {
            return $('#ctl00_tempMachineName').val().split("-***-")[1] || "nothing";
        } catch (e) {
            return "Nothing";
        }
    }
}
$(document).ready(function () {
    $('#skip-to-main').click(function (e) {
        var tabFix = $('div[role="main"]');
        if (tabFix !== null && tabFix !== undefined) {
            tabFix.attr('tabIndex', '0');
            tabFix.focus();
        }

        if (e) {
            e.preventDefault();
        }
    });

    try {
        if (typeof showClearSummaryBoxConfirmationBox !== 'undefined' && typeof showClearSummaryBoxConfirmationBox === 'function') {
            //$(document).on("click", "#ctl00_c_progressBar_lnkChooseFlight", function (e) { showClearSummaryBoxConfirmationBox(e); });
            $("#ctl00_c_progressBar_lnkChooseFlight").bind('click', function (e) { showClearSummaryBoxConfirmationBox(e); });
            if (window.location.toString().indexOf('PassengerDetails.aspx'))
                $("#ctl00_c_lnkPreviousStep").bind('click', function (e) { showClearSummaryBoxConfirmationBox(e); });

        }
        $("#btnSummaryBoxClearCancel").on("click", function (e) {
            $("#divSummaryBoxClearConfirmation").hide();
            $(".container-overlay").hide();
        });
        $("#btnSummaryBoxClearOk").on("click", function (e) {
            var currentURL = window.location.href;
            $("#divSummaryBoxClearConfirmation").hide();
            $(".container-overlay").hide();

            __doPostBack('ctl00$c$progressBar$lnkChooseFlight', '');
        });
    } catch (e) {

    }
});

function showClearSummaryBoxConfirmationBox(e) {
    if ($(".ts-sc__empty").css("display") === "none" && $("#divSummaryBoxClearConfirmation").html().length > 0) {
        e.preventDefault();
        $("#divSummaryBoxClearConfirmation").show();
        $(".container-overlay").show();
        $("#btnSummaryBoxClearOk").keypress(function (e) {
            var code = e.keyCode || e.which;
            if (code === 9) {
                $("#btnSummaryBoxClearCancel").focus();
                e.preventDefault();
            }
        });
        $("#btnSummaryBoxClearCancel").keypress(function (e) {
            var code = e.keyCode || e.which;
            if (code === 9 && e.shiftKey) {
                $("#btnSummaryBoxClearOk").focus();
                e.preventDefault();
            }
        });
        setTimeout(function () {
            $('.summary-box-clear-alert-container').focus();
        }, 500);
        return false;
    }
}

//SSO -

function setCookies(refCookieEndpoint, refreshtoken, reftokenJSURL) {

    if (refCookieEndpoint != undefined && refCookieEndpoint != '') {
        var js = document.createElement('script');
        js.id = 'reftokenJS';
        js.async = true;
        js.src = reftokenJSURL;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(js, s);
        setTimeout(function () {
            window.iframeHandler.addIframe({ src: refCookieEndpoint, refToken: refreshtoken });
            //Refresh_Cookie_Update - Status of cookie update in other domains, iFrame status
            if ($("div[id$='dvSSOSessionAlive']").attr('IsSSOUILoggingReq') === "Y") {
                async.log("", true, async.getModuleName(), "Refresh_Cookie_Update");
            }
        }, 1000);

    }
}

function setrefreshcookies(refCookieEndpoint, refreshtoken, reftokenJSURL) {
    try {
        $(window).load(function () {
            setCookies(refCookieEndpoint, refreshtoken, reftokenJSURL);
        });
    }
    catch (e) { console.log(e); }
}

function logoutme(sender, e, logoutEndPoint, refCookieEndpoint, reftokenJSURL) {
    e.preventDefault();
    if (localStorage.getItem("canTriggerKPITracker") != undefined && localStorage.getItem("canTriggerKPITracker") != null)
        localStorage.removeItem("canTriggerKPITracker");
    try {
        $.ajax({
            url: logoutEndPoint,
            type: 'DELETE',
            xhrFields: { withCredentials: true },
            accept: 'application/json',
            error: function (xhr, status, err) {
                console.log(err);
            }
        });

        setCookies(refCookieEndpoint, '', reftokenJSURL);

        //SSO GAT for logout
        //WATP.PushEvent('EventTrigger.Generic_KPITracker', 'Logout', 'Success', 0, 'KPI Tracker');
        setTimeout(function () {
            location.href = $(sender).attr('href');
        }, 1500);
    }

    catch (e) { console.log(e); }
}

function keepSessionAlive() {
    var keepAliveEndpoint = $("div[id$='dvSSOSessionAlive']").attr('KeepSessionAliveUrl');
    var keepAliveTime = $("div[id$='dvSSOSessionAlive']").attr('KeepSessionAliveTime');
    setTimeout(function () {
        $("#ifrSessionAlive").attr("src", keepAliveEndpoint);

    }, keepAliveTime);

}

function setGALogoutValues() {//[NA] - [SSO-1970] - Clear GA memeber details upon logout.
    setTimeout(function () {
        try {
            dataLayer[0].memberLoginType = "Public";
            dataLayer[0].memberTier = "Without Profile";
            if (!dataLayer[0].personAndGuestID) {
                dataLayer[0].personAndGuestID = "Without Profile";
            }
            dataLayer[0].visitorLoginState = "Logged Out";

            dataLayer.push({
                'event': 'DataPush.KPITracker_Logout',
                'category': 'KPI Tracker',
                'action': 'Logout',
                'label': 'Success',
                'personAndGuestID': dataLayer[0].personAndGuestID,
                'memberTier': dataLayer[0].memberTier,
                'pageName': dataLayer[0].pageName,
                'value': 0
            });
        } catch (e) {
            console.log(e);
            dataLayer.push({
                'event': 'DataPush.KPITracker_Logout',
                'category': 'KPI Tracker',
                'action': 'Logout',
                'label': 'Success',
                'personAndGuestID': 'Without Profile',
                'memberTier': 'Without Profile',
                'pageName': dataLayer[0].pageName,
                'value': 0
            });
        }

    }, 2000);
}
function getCurrentPageName() {
    var sPath = window.location.pathname;    
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    if (sPage) {
        sPage = sPage.replace(".aspx", "");
    }
    return sPage;
}

//PSD2-CPG

var dRefernceId = "";


var worldPayCall;
//var CanInitDDCSession = 0;

var ddcSwitch = {
    get payment() {
        return getValueBySpliting($("#hdnDdcSwitch").val(), '|', 0);
    },
    get initSession() {
        return getValueBySpliting($("#hdnDdcSwitch").val(), '|', 1);
    },
    get verification() {
        return getValueBySpliting($("#hdnDdcSwitch").val(), '|', 2);
    }
};
function getValueBySpliting(str, separator, ix) {
    ret = "";
    try { ret = str.split(separator)[ix]; }
    catch (e) { ret = "" }
    return ret;
}

function InitDDCSession() {
    var page = $('#heading_upgrade_with_miles').data('page');
    if (page != "GRFB" && page != "PAIDTIER" && page != "TravelInsurance") {
        if (ddcSwitch.initSession == 1 && $("#hdnJWTToken").val()) {
            dRefernceId = "";
            $("#ddcCollectionForm").attr("style", "display:block");
            document.getElementById('ddcCollectionForm').submit();
            async.log($('#hdnJWTToken').val(), true, async.getModuleName(), "DDC_CardinalCommerce_InitDDCSession_PSD2" + getCurrentPageName());            
        }
    }    
}

window.addEventListener("message", function (event) { //TO DO PSD2: Logging
    if (event.origin == $("#hdnDCCOrigin").val()) {
        try {
            var drefid = '';
            clearInterval(worldPayCall);
            var data = JSON.parse(event.data);
            if (typeof data != undefined && data.Status) {
                drefid = data.SessionId;
                dRefernceId = data;
                setdRefID(drefid);
                //TO DO PSD2: Success Logging
            }
            else {
                async.log("Error Occured :" , false, async.getModuleName(), "DDC_CardinalCommerce_Response_PSD2" + getCurrentPageName());
            }
            setSPCGRF(drefid);
        }
        catch (err) {
            async.log("Exception Occured :  " + err.message, false, async.getModuleName(), "DDC_CardinalCommerce_Response_PSD2" + getCurrentPageName());
        }
    }
}, false);

function setSPCGRF(drefid) {
    if (typeof activeSP != 'undefined' && activeSP && activeSP.length) {
        {
            activeSP.shift().data('drefid', drefid);
        }
    }
}
    function setdRefID(dRefID) {
        var ajaxURL = $('#hdnAjaxURL').val();
        var datapost = {};

        datapost['dRefID'] = dRefID;;

        datapost['t'] = 'setddcreferenceid';
        var reqpost = JSON.stringify(datapost);
        async.log(reqpost, true, async.getModuleName(), "DDC_CardinalCommerce_Response_PSD2" + getCurrentPageName());
        acall = $.ajax({
            type: 'post',
            datatype: "json",
            async: true,
            url: ajaxURL,
            data: reqpost,
            error: function () { acall.abort(); }
        });
        //TO DO PSD2: Success Logging
};

    function callDDCFrame() {
        dRefernceId = "";
        var retry = {
            numberOfRetry: parseInt($("#hdnDDCRetryCount").val()),
            interval: parseInt($("#hdnDDCRetryTimeout").val())
        };
        $("#ddcCollectionForm").attr("style", "display:block");
        var worldPayCounter = 0;

        async.log($('#hdnJWTToken').val(), true, async.getModuleName(), "DDC_CardinalCommerce_Initation_PSD2" + getCurrentPageName());

        document.getElementById('ddcCollectionForm').submit();
        worldPayCounter = worldPayCounter + 1;

        if (retry.numberOfRetry > 0) {
            worldPayCall = setInterval(function () {
                document.getElementById('ddcCollectionForm').submit();
                worldPayCounter = worldPayCounter + 1;
                if (worldPayCounter >= retry.numberOfRetry) {
                    clearInterval(worldPayCall);
                    setSPCGRF('');
                }
                if (dRefernceId == "") {
                    async.log($('#hdnJWTToken').val(), true, async.getModuleName(), "DDC_CardinalCommerce_ReTry_Initation_PSD2" + getCurrentPageName());
                    document.getElementById('ddcCollectionForm').submit();
                }
            }, retry.interval);
        }
    }

    $(document).ready(function () {
        if ($("div[id$='dvSSOSessionAlive']").length > 0) {
            keepSessionAlive();
        }
    });
