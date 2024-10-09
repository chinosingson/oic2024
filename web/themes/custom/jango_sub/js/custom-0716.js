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

    // Ocean Innovators Map
    // var beneficiary = "#E3AF20";
    // var proponent = "#333399";
    var pinColor = "#E3A443";
    var svgPath = "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123";

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
            longitude: 29.126347,
            latitude: 36.659245,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: Exotic Pufferfish Leather Products - Turkey / Mersea",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/exotic-pufferfish-leather-products",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 92.3068098,
            latitude: 20.6287347,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: SEA Success - Bangladesh",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/sea-success",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 99.3454507,
            latitude: 7.2436167,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: SEA Success - Thailand",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/sea-success",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 6.143158,
            latitude: 46.204391,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: SEA Success - IUCN",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/sea-success",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 48.101149,
            latitude: -13.3117808,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: Community roles in multiple use areas in Madagascar",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/ensuring-community-roles-complex-multiple-use-areas-madagascar",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -71.4243856,
            latitude: 41.4927336,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: Community roles in multiple use areas in Madagascar - URI CRC",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/ensuring-community-roles-complex-multiple-use-areas-madagascar",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 118.61976,
            latitude: 4.470559,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: Mapping and Monitoring of Ecosystems with Copernicus Sentinel",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/mapping-and-monitoring-ecosystems-scale-copernicus-sentinel-2-imagery-tropical",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 103.5656175,
            latitude: 4.5246881,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: Mapping and Monitoring of Ecosystems with Copernicus Sentinel - DHI Malaysia",
            url: "/cohort-3-mpas-area-based-management-and-blue-economy#cbp=/ocean-innovations/mapping-and-monitoring-ecosystems-scale-copernicus-sentinel-2-imagery-tropical",
            urlTarget: "_self",
          },
          //
          {
            selectable: true,
            longitude: -83.753426,
            latitude: 9.748917,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Promoting ocean laws - Costa Rica / OneSea",
            url: "/ocean-innovators#cbp=/ocean-innovations/promoting-laws-protect-our-oceans-support-civil-society-and-coastal-communities",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -113.471191,
            latitude: 28.149503,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Nutrialgae fertilizers - Mexico",
            url: "/ocean-innovators#cbp=/ocean-innovations/nutrialgae-novel-sustainable-algae-based-fertilizers",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 73.22068,
            latitude: 3.202778,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  EPR Maldives",
            url: "/ocean-innovators#cbp=/ocean-innovations/developing-epr-scheme-plastic-and-packaging-waste-maldives",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 13.404927,
            latitude: 52.520005,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  EPR Maldives - adelphi GmbH",
            url: "/ocean-innovators#cbp=/ocean-innovations/developing-epr-scheme-plastic-and-packaging-waste-maldives",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 43.7419,
            latitude: -12.2822,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  PET recovery, buy-back center - Comoros / UNDP Comoros",
            url: "/ocean-innovators#cbp=/ocean-innovations/establishment-pet-recovery-and-buy-back-center",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -78.9427,
            latitude: 36.00483,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Global Plastics Policy Inventory - Global / Duke University",
            url: "/ocean-innovators#cbp=/ocean-innovations/tracking-government-responses-global-plastics-policy-inventory",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 101.975769,
            latitude: 4.210484,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Fashion industry microfiber - Malaysia",
            url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 113.921326,
            latitude: -0.789275,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Fashion industry microfiber - Indonesia",
            url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 108.277199,
            latitude: 14.058324,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Fashion industry microfiber - Vietnam",
            url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 103.819854,
            latitude: 1.352004,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Fashion industry microfiber - Forum for the Future",
            url: "/ocean-innovators#cbp=/ocean-innovations/tackling-microfibres-source-investigating-opportunities-reduce-microfibre",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -23.5075,
            latitude: 14.9167,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Nutrient recycling in wastewater for SIDS - Cape Verde",
            url: "/ocean-innovators#cbp=/ocean-innovations/phos-value-sustainable-solutions-nutrient-recycling",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -9.259483,
            latitude: 39.088289,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Nutrient recycling in wastewater for SIDS - AquaInSilico",
            url: "/ocean-innovators#cbp=/ocean-innovations/phos-value-sustainable-solutions-nutrient-recycling",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -6.200684,
            latitude: 35.245619,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Nutrialgae fertilizers - Morocco",
            url: "/ocean-innovators#cbp=/ocean-innovations/nutrialgae-novel-sustainable-algae-based-fertilizers",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -3.69976,
            latitude: 42.340889,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Nutrialgae fertilizers - Ficosterra",
            url: "/ocean-innovators#cbp=/ocean-innovations/nutrialgae-novel-sustainable-algae-based-fertilizers",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 121.774017,
            latitude: 12.879721,
            svgPath: svgPath,
            color: pinColor, // yellow
            scale: 1,
            title: "C1:  Fortuna Coconut Coolers - Philippines",
            url: "/ocean-innovators#cbp=/ocean-innovations/fortuna-coconut-coolers",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -122.419418,
            latitude: 37.774929,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C1:  Fortuna Coconut Coolers - FortunaCools",
            url: "/ocean-innovators#cbp=/ocean-innovations/fortuna-coconut-coolers",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 18.464625,
            latitude: -33.915933,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3:  Universal Fishery IDs - South Africa",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/universal-fishery-ids",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 57.479111,
            latitude: -20.2658,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Space-Based Maritime Surveillance System for IUUF - Mauritius",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/space-based-maritime-surveillance",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -77.04132,
            latitude: -12.09797,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Ending IUUF in Peruvian SSF through traceability technology - WWF-Peru",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/ending-peru-iuu",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -80.028860,
            latitude: 0.153580,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: IUUF behaviour of Distant Water Fishing Fleets - Ecuador",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -79.966438,
            latitude: -3.45143,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Reducing by-catch in gillnet fisheries - Ecuador / Mare Nostrum Foundation",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iluminar-el-mar",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 130.186420,
            latitude: -2.956118,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Renewable energy technologies reducing post-harvest loss - Indonesia / Yayasan IPNLF",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/renewable-energy-technologies",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 73.56832,
            latitude: 0.44261,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Increasing Economic Benefits for Women Fisherfolk in the Maldives - IPNLF Maldives",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/women-fisherfolk-maldives",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -0.186964,
            latitude: 5.603717,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: IUUF behaviour of Distant Water Fishing Fleets - Ghana",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
          },
          //{ "selectable": true,"longitude": -84.83374,"latitude": 9.97742,"svgPath": svgPath,"color":"#E3AF20","scale": 1,"title":"Sustainable longline fisheries through selective gear and responsible value chains","url":"/oceaninnovators-cohort2#cbp=/ocean-innovations/best-practices-longline-fisheries","urlTarget": "_self"},
          {
            selectable: true,
            longitude: 120.984222,
            latitude: 13.599512,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "Universal Fishery IDs: Expanding transparency, data flow, and equity for fisheries globally",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/universal-fishery-ids",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 121.049665,
            latitude: 14.665319,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: IUUF behaviour of Distant Water Fishing Fleets - Philippines",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -17.467686,
            latitude: 14.716677,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: IUUF behaviour of Distant Water Fishing Fleets - Senegal",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -77.399445,
            latitude: 25.053290,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Caribbean spiny lobster aquaculture and fisheries management - Bahamas",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/caribbean-spiny-lobster",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -112.06123,
            latitude: 25.9385,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title: "C3: Value Rescue of Small-Scale Fisheries in Mexico - SmartFish",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/ssf-valuerescue-mexico",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 21.278810,
            latitude: -157.784031,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "Universal Fishery IDs: Expanding transparency, data flow, and equity for fisheries globally",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/universal-fishery-ids",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -3.531216,
            latitude: 50.719354,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Caribbean spiny lobster aquaculture and fisheries management - University of Exeter",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/caribbean-spiny-lobster",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -0.55995,
            latitude: 51.314758,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: Space-Based Maritime Surveillance System for IUUF - Surrey Space Centre",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/space-based-maritime-surveillance",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -0.127758,
            latitude: 53.507351,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C3: IUUF behaviour of Distant Water Fishing Fleets - ODI",
            url: "/oceaninnovators-cohort2#cbp=/ocean-innovations/iuu-fishing-dwf",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 37.683855, 
            latitude: -6.828668, 
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C4: Solar Dryers for Zanzibar Seaweed Industry - MAVUNOLAB",
            url: "/cohort-4#cbp=/ocean-innovations/unlocking-zanzibars-seaweed-industry-low-cost-solar-dryers ",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 57.424163,
            latitude: -20.511243, 
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C4: Sustainable Octopus Fishery Management - Eco Marine Consultants",
            url: "/cohort-4#cbp=/ocean-innovations/enhancing-coastal-community-livelihoods-through-sustainable-octopus-fishery",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 6.599540,
            latitude: 0.137053, 
            svgPath: svgPath,
            color: pinColor,
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
            color: pinColor,
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
            color: pinColor,
            scale: 1,
            title:
              "C4: Turning Sargassum into Organic Fertilizer - AgriShare Company Ltd",
            url: "/cohort-4#cbp=/ocean-innovations/recycling-sargassum-waste-environmental-and-social-good-benefit-small-farmers",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: -59.508364,
            latitude: 13.054879,  
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C4: The BlueBot Project - Bajan Digital Creations",
            url: "/cohort-4#cbp=/ocean-innovations/bluebot-project",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 44.144837,
            latitude: -24.046955,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C4: SELECT’CRAB - RENAFEP-MADA",
            url: "/cohort-4#cbp=/ocean-innovations/selectcrab",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 45.203052,
            latitude: 1.959632,  
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C4: Training 20 Women for Net Mending - ADT",
            url: "/cohort-4#cbp=/ocean-innovations/training-20-women-net-mending-creating-livelihood-and-improving-incomes",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 45.203052,
            latitude: 1.959632,
            svgPath: svgPath,
            color: pinColor,
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
            color: pinColor,
            scale: 1,
            title:
              "C4: Sustainable Seaweed Farming - SIDI",
            url: "/cohort-4#cbp=/ocean-innovations/sustainable-seaweeds-farming-tanzania",
            urlTarget: "_self",
          },
          {
            selectable: true,
            longitude: 36.912699,
            latitude: -17.853343,
            svgPath: svgPath,
            color: pinColor,
            scale: 1,
            title:
              "C4: OceanUbuntu - Association Mar Mocambique",
            url: "/cohort-4#cbp=/ocean-innovations/oceanubuntu",
            urlTarget: "_self",
          },
        ],
      },
      // legend: {
      //   width: "190",
      //   fontSize: 12,
      //   marginRight: 20,
      //   marginLeft: 20,
      //   equalWidths: true,
      //   backgroundAlpha: 0.5,
      //   backgroundColor: "#FFFFFF",
      //   borderColor: "#ffffff",
      //   borderAlpha: 1,
      //   right: 20,
      //   top: 20,
      //   horizontalGap: 10,
      //   data: [
      //     {
      //       title: "Beneficiary Country",
      //       color: pinColor,
      //     },
      //     {
      //       title: "Proponent Country",
      //       color: pinColor,
      //     },
      //   ],
      // },
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
