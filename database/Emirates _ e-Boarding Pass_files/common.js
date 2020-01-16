/* ======================= */
/* Cufon applying functions */
/* ======================= */
function applyCufon(where, what) {
    if (window.isRTL) return;
    if (typeof (Cufon) == 'undefined' || typeof (Cufon) == null) return;
    Cufon.replace(where, { fontFamily: what, hover: true });
}
function applyFonts(where, what) {
    // Bail of RTL, cufon uses 'left' to position the letters, and we need 'right' for rtl languages
    var isMobile = (typeof EKApp != 'undefined') ? EKApp.Device() : false;
    if ($('body').css('direction') === 'rtl' || isMobile) {
        return;
    }

    var bolds = '.widgetMember h5, .count, .widgetTitle, .boostMiles a, .travelBook .topBook, #heroContainer .greeting, #sl-menu li.first, .noShow .thumbs .status';
                                                                                                                                   //Vinh Cao - Add h4:not(.nocufon)
    var mediums = 'h1:not(.nocufon), h2:not(.nocufon), h3:not(.nocufon), .userInfo, .contentBanner h5, .whatToDo, .widgetPiece > a, h4:not(.nocufon), .milesCount, .contentHeadline p, .ourPartnersBlock h5, .partnerRewardsBlock h5, .bannerText p, .fareItemBackground td p, .milesCalculator h5, .membershipWelcome, .EK_Font, .tabContent h5, .offersContainer.desc p:not(.expiration), .faqBox h5, .slideshowContainer .title, .button-user-tier .milesCount, .section.offers .cstmTitle span, ul.offersList .offerTitle, .featuredDest h5,.faresCstmScroll .from, .findFlightBtn input, .skywardsPanel .button-user-tier .memberMiles, .noUpcomingTitle, .fastFactsNumberStyle, .cufon-medium';
    var lights = '.faqBox h6, .commonHeader h3, .milesPerClass span, .contentBoxesWrapper h6, .contentBoxesWrapper li, .tt_title, .fareItemBackground td a, .sectionTitle, .contentOfferBlock h2:not(.nocufon), .partnerName, .accelHeading, .accelText, .destinationWidgetTitle, .findFlightSubmit, .button-user-tier .milesTitle, .button-user-tier .userName, .descriptionCell p';
    var EKBold = 'EK03SerifB';
    var EKMedium = 'Emirates PM';
    var EKLight = 'EK03SerifL';

    if (where && what) {
        switch (what) {
            case 'bold':
                bolds += (', ' + where);
                break;
            case 'medium':
                mediums += (', ' + where);
                break;
            case 'light':
                lights += (', ' + where);
                break;
            default: break;
        }
    }

    //applyCufon(bolds, EKBold);
    //applyCufon(mediums, EKMedium);
    //applyCufon(lights, EKLight);
}

    //applyFonts();

