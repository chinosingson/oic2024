/**
 * @file
 * Global utilities.
 *
 */
(($, Drupal) => {
  "use strict";

  const $win = $(window);
  const $doc = $(document);

  // BEGIN: Layout Go To Top override original function
  $win[0].LayoutGo2Top = (function () {
    var handle = function () {
      var currentWindowPosition = $(window).scrollTop(); // current vertical position
      if (currentWindowPosition > 300) {
        $(".c-layout-go2top").removeClass("hide").addClass("shown");
      } else {
        $(".c-layout-go2top").removeClass("shown").addClass("hide");
      }
    };

    return {
      //main function to initiate the module
      init: function () {
        handle(); // call headerFix() when the page was loaded

        if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
          $(window).bind("touchend touchcancel touchleave", function (e) {
            handle();
          });
        } else {
          $(window).scroll(function () {
            handle();
          });
        }

        $(".c-layout-go2top").on("click", function (e) {
          e.preventDefault();
          $("html, body").animate(
            {
              scrollTop: 0,
            },
            600,
            "linear"
          );
        });
      },
    };
  })();

  /*
   * Document Ready
   */
  $doc.ready(() => {
    // hide responsive_menu when item is clicked
    $('.mm-listitem > a[href*="/#"]').on("click", function () {
      setTimeout(function () {
        $(".mm-wrapper__blocker .mm-tabstart")[0].click();
      }, 600);
    });

    $(".footer-newsletter .js-form-type-email").on("click", function () {
      $(".my_modal_Launchdefaultmodal").modal("show");
    });

    // Match heights.
    $(".views-library-page .library-grid-item").matchHeight();

    // Add trailing slash in breadcrumbs
    $(".c-page-breadcrumbs > li").each(function () {
      if (
        $(this).find("a").length > 0 &&
        $(this).next().find("a").text() !== ""
      ) {
        $(this).after("<li>/</li>");
      }
    });

    $('#AMmap').ready(function(){
      // Ocean Innovators Map
      // var beneficiary = "#E3AF20";
      // var proponent = "#333399";
      var mapColors = {}
      mapColors = [];
      var cohortColors = {
        c1: {developing: '#140fec', developed: '#81AEEF'},
        c2: {developing: '#D57A00', developed: '#FFC271'},
        c3: {developing: '#09b7b9', developed: '#8DC6C5'},
        c4: {developing: '#069206', developed: '#069206'},
      };
      mapColors.cohorts = cohortColors;
      // var pinColor = "#E3A443";
      var svgPathOld = "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123";
      var svgPath = "M3.15,11.949C3.15,5.598,8.298,0.45,14.648,0.45C20.999,0.45,26.148,5.598,26.148,11.949C26.148,13.086,25.98,14.183,25.674,15.223C23.936,21.844,14.597,29.25,14.597,29.25C14.597,29.25,3.933,20.888,3.306,13.988C3.306,13.988,3.334,13.982,3.334,13.982C3.215,13.324,3.15,12.644,3.15,11.949C3.15,11.949,3.15,11.949,3.15,11.949M14.492,14.511C17.09,14.511,19.196,12.404,19.196,10.306C19.196,8.207,17.09,6.1,14.492,6.1C11.895,6.1,9.789,8.207,9.789,10.306C9.789,12.404,11.895,14.511,14.492,14.511C14.492,14.511,14.492,14.511,14.492,14.511";
      AmCharts.makeChart("AMmap", {
        type: "map",
        pathToImages: "http://www.amcharts.com/lib/3/images/",
        addClassNames: true,
        fontSize: 14,
        color: "#000000",
        projection: "eckert3",
        backgroundAlpha: 1,
        backgroundColor: "rgba(246,248,250,1)",
        dataProvider: {
          map: "worldLow",
          getAreasFromMap: true,
          images: [
            {
              selectable: true,
              longitude: 39.309350, 
              latitude: -6.157441, 
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Solar Dryers for Zanzibar, Tanzania Seaweed Industry - MAVUNOLAB",
              url: "/cohort-4#cbp=/ocean-innovations/unlocking-zanzibars-seaweed-industry-low-cost-solar-dryers ",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 57.424163,
              latitude: -20.511243, 
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Sustainable Octopus Fishery Management in Mauritius - Eco Marine Consultants",
              url: "/cohort-4#cbp=/ocean-innovations/enhancing-coastal-community-livelihoods-through-sustainable-octopus-fishery",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 6.599540,
              latitude: 0.137053, 
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Solar Food Dehydrator - ONG MARAPA",
              url: "/cohort-4#cbp=/ocean-innovations/solar-food-dehydrator-sustainable-and-safe-alternative",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 1.524697,
              latitude: 6.245322, 
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Togo Mangrove Honey - TMSU INTERNATIONAL",
              url: "/cohort-4#cbp=/ocean-innovations/mangrove-honey-togo",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: -77.660997,
              latitude: 18.489244, 
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Turning Sargassum into Organic Fertilizer - Jamaica / AgriShare Company Ltd",
              url: "/cohort-4#cbp=/ocean-innovations/recycling-sargassum-waste-environmental-and-social-good-benefit-small-farmers",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: -59.508364,
              latitude: 13.054879,  
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: The BlueBot Project - Barbados / Bajan Digital Creations",
              url: "/cohort-4#cbp=/ocean-innovations/bluebot-project",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 44.144837,
              latitude: -24.046955,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: SELECT’CRAB - Madagascar / RENAFEP-MADA",
              url: "/cohort-4#cbp=/ocean-innovations/selectcrab",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 45.203052,
              latitude: 1.959632,  
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Training 20 Women for Net Mending - Somalia / ADT",
              url: "/cohort-4#cbp=/ocean-innovations/training-20-women-net-mending-creating-livelihood-and-improving-incomes",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 38.063828,
              latitude: -17.207622,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Enhancing tourism in Bajone Sanctuary - ACAMBIDEC",
              url: "/cohort-4#cbp=/ocean-innovations/activating-nature-based-tourism-capacity-bajone-sanctuary-through-community",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 39.313700,
              latitude: -6.176895,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Sustainable Seaweed Farming - Tanzania / SIDI",
              url: "/cohort-4#cbp=/ocean-innovations/sustainable-seaweeds-farming-tanzania",
              urlTarget: "_self",
            },
            {
              selectable: true,
              longitude: 36.912699,
              latitude: -17.853343,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: OceanUbuntu - Mozambique / Association Mar Mocambique",
              url: "/cohort-4#cbp=/ocean-innovations/oceanubuntu",
              urlTarget: "_self",
            },   
	    {
              selectable: true,
              longitude: 36.905336,
              latitude: -17.856841,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Enhanced Bons Sinais Estuary Mud Crab Fishery - Mozambique / CEC-UEM",
              url: "/cohort-4#cbp=/ocean-innovations/boosting-artisanal-mud-crab-fishery-bons-sinais-estuary-through-controlled",
              urlTarget: "_self",
            },       
	    {
              selectable: true,
              longitude: 57.452063,
              latitude: -20.500302,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Green Solutions to Coastal Erosion - Mauritius  / Coral Garden Conservation",
              url: "/cohort-4#cbp=/ocean-innovations/green-solutions-combat-coastal-erosion-community-based-approach-protect-and",
              urlTarget: "_self",
            },


// <!--[ADDITIONAL COHORT4]-->


            {
              selectable: true,
              longitude: 31.680133,
              latitude: 30.715393,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Transforming fish waste into value-added products - Egypt / Life Maker Association",
              url: "/cohort-4#cbp=/ocean-innovations/transformation-fish-waste-value-added-products",
              urlTarget: "_self",
            },   
	    {
              selectable: true,
              longitude: 47.511125,
              latitude: -18.884357,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Empowering women and youth in sustainable coastal ecotourism for LMMA - Madagascar / Reseau Mihari",
              url: "/cohort-4#cbp=/ocean-innovations/empowering-women-youth-org-lmma",
              urlTarget: "_self",
            },       
	    {
              selectable: true,
              longitude: 39.697924,
              latitude: -4.056573,
              svgPath: svgPath,
              color: mapColors.cohorts.c4.developing,
              scale: 1,
              title:
                "C4: Enhanced women's role in fish value addition - Kenya  / Coastal and Marine Resource Development Limited",
              url: "/cohort-4#cbp=/ocean-innovations/green-solutions-combat-coastal-erosion-community-based-approach-protect-and",
              urlTarget: "_self",
            },


// <!--[COHORT3]-->


            {
                selectable: true,
                longitude: 29.126347,
                latitude: 36.659245,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: Exotic Pufferfish Leather Products - Turkey / Mersea",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/exotic-pufferfish-leather-products",
                urlTarget: "_self",
                country: "Turkey",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 92.3068098,
                latitude: 20.6287347,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: SEA Success - Bangladesh / IUCN",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/sea-success",
                urlTarget: "_self",
                country: "Bangladesh",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 99.3454507,
                latitude: 7.2436167,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: SEA Success - Thailand / IUCN",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/sea-success",
                urlTarget: "_self",
                country: "Thailand",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 6.143158,
                latitude: 46.204391,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: SEA Success - Bangladesh and Thailand / IUCN",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/sea-success",
                urlTarget: "_self",
                country: "Switzerland",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: 48.101149,
                latitude: -13.3117808,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: Community roles in multiple use areas in Madagascar - URI CRC",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/ensuring-community-roles-complex-multiple-use-areas-madagascar",
                urlTarget: "_self",
                country: "Madagascar",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: -71.4243856,
                latitude: 41.4927336,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developed,
                scale: 1,
                title: "C3: Community roles in multiple use areas in Madagascar - URI CRC",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/ensuring-community-roles-complex-multiple-use-areas-madagascar",
                urlTarget: "_self",
                country: "USA",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: 118.61976,
                latitude: 4.470559,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: Mapping and Monitoring of Ecosystems with MCSAV - DHI Malaysia",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/mapping-and-monitoring-ecosystems-scale-copernicus-sentinel-2-imagery-tropical",
                urlTarget: "_self",
                country: "Malaysia",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 103.5656175,
                latitude: 4.5246881,
                svgPath: svgPath,
                color: mapColors.cohorts.c3.developing,
                scale: 1,
                title: "C3: Mapping and Monitoring of Ecosystems with MCSAV - DHI Malaysia",
                url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/mapping-and-monitoring-ecosystems-scale-copernicus-sentinel-2-imagery-tropical",
                urlTarget: "_self",
                country: "Malaysia",
                status: "Developing"
              },



// <!--[COHORT1]-->


              {
                selectable: true,
                longitude: -83.753426,
                latitude: 9.748917,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Promoting ocean laws - Costa Rica / OneSea",
                url: "/ocean-innovators#cbp=/ocean-innovations/promoting-laws-protect-our-oceans-support-civil-society-and-coastal-communities",
                urlTarget: "_self",
                country: "Costa Rica",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: -113.471191,
                latitude: 28.149503,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Nutrialgae fertilizers - Mexico / Ficosterra",
                url: "/ocean-innovators#cbp=/ocean-innovations/nutrialgae-novel-sustainable-algae-based-fertilizers",
                urlTarget: "_self",
                country: "Mexico",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: -6.200684,
                latitude: 35.245619,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Nutrialgae fertilizers - Morocco / Ficosterra",
                url: "/ocean-innovators#cbp=/ocean-innovations/nutrialgae-novel-sustainable-algae-based-fertilizers",
                urlTarget: "_self",
                country: "Morocco",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: -3.69976,
                latitude: 42.340889,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1:  Nutrialgae fertilizers - Mexico and Morocco / Ficosterra",
                url: "/ocean-innovators#cbp=/ocean-innovations/nutrialgae-novel-sustainable-algae-based-fertilizers",
                urlTarget: "_self",
                country: "Spain",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: 73.22068,
                latitude: 3.202778,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: EPR Maldives - adelphi",
                url: "/ocean-innovators#cbp=/ocean-innovations/developing-epr-scheme-plastic-and-packaging-waste-maldives",
                urlTarget: "_self",
                country: "Maldives",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 13.404927,
                latitude: 52.520005,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developed,
                scale: 1,
                title: "C1: EPR Maldives - adelphi",
                url: "/ocean-innovators#cbp=/ocean-innovations/developing-epr-scheme-plastic-and-packaging-waste-maldives",
                urlTarget: "_self",
                country: "Germany",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: 43.7419,
                latitude: -12.2822,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: PET and can  buy-back center - Comoros / UNDP Comoros",
                url: "/ocean-innovators#cbp=/ocean-innovations/establishment-pet-recovery-and-buy-back-center",
                urlTarget: "_self",
                country: "Comoros",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: -78.9427,
                latitude: 36.00483,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Global Plastics Policy Inventory - Global / Duke University",
                url: "/ocean-innovators#cbp=/ocean-innovations/tracking-government-responses-global-plastics-policy-inventory",
                urlTarget: "_self",
                country: "USA",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: 101.975769,
                latitude: 4.210484,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Fashion industry microfiber - Malaysia / Forum for the Future",
                url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
                urlTarget: "_self",
                country: "Malaysia",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 113.921326,
                latitude: -0.789275,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Fashion industry microfiber - Indonesia / Forum for the Future",
                url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
                urlTarget: "_self",
                country: "Indonesia",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 108.277199,
                latitude: 14.058324,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1: Fashion industry microfiber - Vietnam / Forum for the Future",
                url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
                urlTarget: "_self",
                country: "Vietnam",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: 103.819854,
                latitude: 1.352004,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developed,
                scale: 1,
                title: "C1: Fashion industry microfiber - Singapore, Vietnam, Indonesia / Forum for the Future",
                url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
                urlTarget: "_self",
                country: "Singapore",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: -23.5075,
                latitude: 14.9167,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1:  Nutrient recycling in wastewater - Cape Verde / AquaInSilico",
                url: "/ocean-innovators#cbp=/ocean-innovations/phos-value-sustainable-solutions-nutrient-recycling",
                urlTarget: "_self",
                country: "Cape Verde",
                status: "Developing"
              },
              {
                selectable: true,
                longitude: -9.259483,
                latitude: 39.088289,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developed,
                scale: 1,
                title: "C1:  Nutrient recycling in wastewater - Cape Verde / AquaInSilico",
                url: "/ocean-innovators#cbp=/ocean-innovations/phos-value-sustainable-solutions-nutrient-recycling",
                urlTarget: "_self",
                country: "Portugal",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: -122.419418,
                latitude: 37.774929,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developed,
                scale: 1,
                title: "C1:  Fortuna Coconut Coolers - Philippines / Fortuna Cools",
                url: "/ocean-innovators#cbp=/ocean-innovations/fortuna-coconut-coolers",
                urlTarget: "_self",
                country: "USA",
                status: "Developed"
              },
              {
                selectable: true,
                longitude: 121.774017,
                latitude: 12.879721,
                svgPath: svgPath,
                color: mapColors.cohorts.c1.developing,
                scale: 1,
                title: "C1:  Fortuna Coconut Coolers - Philippines / Fortuna Cools",
                url: "/ocean-innovators#cbp=/ocean-innovations/fortuna-coconut-coolers",
                urlTarget: "_self",
                country: "Philippines",
                status: "Developing"
              },



// <!--[COHORT2]-->




          {
            selectable: true,
            longitude: 18.464625,
            latitude: -33.915933,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Universal Fishery IDs - South Africa / Sustainable Fisheries Partnership",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/universal-fishery-ids",
            urlTarget: "_self",
            country: "South Africa",
            status: "Developing"
          },
          // stray pin
          {
            selectable: true,
            longitude: 21.278810,
            latitude: -157.784031,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developed,
            scale: 1,
            title:
              "C2: Universal Fishery IDs - South Africa, Philippines / Sustainable Fisheries Partnership",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/universal-fishery-ids",
            urlTarget: "_self",
            country: "USA",
            status: "Developed"
          },
          // stray pin
          {
            selectable: true,
            longitude: 120.984222,
            latitude: 13.599512,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Universal Fishery IDs - Philippines / Sustainable Fisheries Partnership",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/universal-fishery-ids",
            urlTarget: "_self",
            country: "Philippines",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: 57.479111,
            latitude: -20.2658,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Space-Based Maritime Surveillance System for IUUF - Mauritius / Surrey Space Centre",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/space-based-maritime-surveillance",
            urlTarget: "_self",
            country: "Mauritius",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -0.55995,
            latitude: 51.314758,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developed,
            scale: 1,
            title:
              "C2: Space-Based Maritime Surveillance System for IUUF - Mauritius / Surrey Space Centre",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/space-based-maritime-surveillance",
            urlTarget: "_self",
            country: "United Kingdom",
            status: "Developed"
          },
          {
            selectable: true,
            longitude: -80.028860,
            latitude: 0.153580,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: IUUF behaviour of Distant Water Fishing Fleets - Ecuador / ODI",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
            country: "Ecuador",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -79.966438,
            latitude: -3.45143,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Reducing by-catch in gillnet fisheries - Ecuador / Mare Nostrum Foundation",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iluminar-el-mar",
            urlTarget: "_self",
            country: "Ecuador",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: 130.186420,
            latitude: -2.956118,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Solar ice-maker to reduce post-harvest loss - Indonesia / Yayasan IPNLF",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/renewable-energy-technologies",
            urlTarget: "_self",
            country: "Indonesia",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -77.04132,
            latitude: -12.09797,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Ending IUUF in Peruvian SSF through TrazApp - WWF-Peru",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/ending-peru-iuu",
            urlTarget: "_self",
            country: "Peru",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: 73.56832,
            latitude: 0.44261,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Increasing Economic Benefits for Women Fisherfolk in the Maldives - IPNLF Maldives",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/women-fisherfolk-maldives",
            urlTarget: "_self",
            country: "Maldives",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -0.186964,
            latitude: 5.603717,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: IUUF behaviour of Distant Water Fishing Fleets - Ghana / ODI",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
            country: "Ghana",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: 121.049665,
            latitude: 14.665319,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: IUUF behaviour of Distant Water Fishing Fleets - Philippines / ODI",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
            country: "Philippines",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -17.467686,
            latitude: 14.716677,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: IUUF behaviour of Distant Water Fishing Fleets - Senegal / ODI",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
            country: "Senegal",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -77.399445,
            latitude: 25.053290,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title:
              "C2: Caribbean spiny lobster aquaculture and fisheries management - The Bahamas / University of Exeter",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/caribbean-spiny-lobster",
            urlTarget: "_self",
            country: "Bahamas",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -112.06123,
            latitude: 25.9385,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developing,
            scale: 1,
            title: "C2: Value Rescue of Small-Scale Fisheries in Mexico - SmartFish",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/ssf-valuerescue-mexico",
            urlTarget: "_self",
            country: "Mexico",
            status: "Developing"
          },
          {
            selectable: true,
            longitude: -3.531216,
            latitude: 50.719354,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developed,
            scale: 1,
            title:
              "C2: Caribbean spiny lobster aquaculture and fisheries management - The Bahamas / University of Exeter",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/caribbean-spiny-lobster",
            urlTarget: "_self",
            country: "United Kingdom",
            status: "Developed"
          },
          {
            selectable: true,
            longitude: -0.127758,
            latitude: 53.507351,
            svgPath: svgPath,
            color: mapColors.cohorts.c2.developed,
            scale: 1,
            title:
              "C3: IUUF behaviour of Distant Water Fishing Fleets - Ghana, Ecuador, Philippines, Senegal / ODI",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
            country: "United Kingdom",
            status: "Developed"
          },











            ],
        },
        legend: {
          width: "300",
          fontSize: 12,
          marginRight: 20,
          marginLeft: 20,
          equalWidths: true,
          backgroundAlpha: 0.5,
          backgroundColor: "#FFFFFF",
          borderColor: "#ffffff",
          borderAlpha: 1,
          right: 20,
          top: 20,
          horizontalGap: 10,
          data: [
            {
              title: "Cohort 1 Marine Pollution Solutions",
              color: mapColors.cohorts.c1.developing,
            },
            {
              title: "Cohort 2 Sustainable Fisheries",
              color: mapColors.cohorts.c2.developing,
            },
            {
              title: "Cohort 3 Coastal and Marine Ecosystems",
              color: mapColors.cohorts.c3.developing,
            },
            {
              title: "Cohort 4 SIDS and LDC Blue Economy",
              color: mapColors.cohorts.c4.developing,
            },
          ],
        },
        balloon: {
          horizontalPadding: 10,
          borderAlpha: 0,
          borderThickness: 1,
          verticalPadding: 10,
          fontSize: 14,
        },
        areasSettings: {
          color: "rgba(62,131,203,1)",
          outlineColor: "rgba(255,255,255,1)",
          rollOverOutlineColor: "rgba(255,255,255,1)",
          rollOverBrightness: 20,
          selectedBrightness: 20,
          selectable: false,
          unlistedAreasAlpha: 0,
          unlistedAreasOutlineAlpha: 0,
          balloonText: "",
        },
        imagesSettings: {
          alpha: 1,
          color: "rgba(62,131,203,1)",
          outlineAlpha: 1,
          rollOverOutlineAlpha: 0,
          outlineColor: "#b85e22",
          rollOverBrightness: 20,
          selectedBrightness: 20,
          selectable: true,
          width: 20,
          height: 20,
        },
        linesSettings: {
          color: "rgba(62,131,203,1)",
          selectable: true,
          rollOverBrightness: 20,
          selectedBrightness: 20,
        },
        zoomControl: {
          zoomControlEnabled: true,
          homeButtonEnabled: true,
          panControlEnabled: false,
          left: 15,
          bottom: 50,
          minZoomLevel: 0.25,
          gridHeight: 100,
          gridAlpha: 0.1,
          gridBackgroundAlpha: 0,
          gridColor: "#FFFFFF",
          draggerAlpha: 1,
          buttonCornerRadius: 2,
        },
      });
    });

  });

  Drupal.behaviors.projectsImageSlider = {
    attach: function (context, settings) {
      $(".node-nd-project .cbp-slider-wrap:not(.cbp-wrapper)", context)
        .once()
        .owlCarousel({
          items: 1,
          dots: true,
          nav: true,
          navText: "",
          autoplay: true,
          autoplayTimeout: 6000,
        });

      $(".slideshow-items > ul", context)
        .once()
        .owlCarousel({
          items: 1,
          dots: false,
          nav: true,
          loop: true,
          mouseDrag: false,
          autoHeight: true,
          autoplay: true,
          autoplayTimeout: 7000,
          navText: ["", ""],
          animateOut: "fadeOut",
        });
    },
  };

  Drupal.behaviors.headerSeachIcon = {
    attach: function (context, settings) {
      $(".c-layout-header", context).on(
        "click",
        ".c-topbar .c-search-toggler",
        function (e) {
          e.preventDefault();
          $("body", context).addClass("c-layout-quick-search-shown");
          console.log("test");
          if (App.isIE() === false) {
            $(".c-quick-search > .form-control").focus();
          }
        }
      );
    },
  };
})(jQuery, Drupal);
