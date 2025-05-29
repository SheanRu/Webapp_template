    <link
      rel="stylesheet"
      href="/charts/vanilla/waterfall-series/examples/simple-waterfall/ag-example-styles.css" />
    <style>
      #myChart {
        margin-top: 2rem;
        width: 100%;
        height: 400px;
        display: block;
      }

      .chart-wrapper {
        width: 100%;
        margin-top: 2rem;
        padding: 1rem;
        border-radius: 8px;
        background: color-mix(in hsl, canvas, canvasText 2%);
        border: 1px solid color-mix(in hsl, canvas, canvasText 30%);
      }

      .chart-layer {
        background: white;
        border-radius: 6px;
        border: 1px solid #ccc;
        padding: 1rem;
        box-shadow: var(--shadow);

      }

      .layer {
        flex-shrink: 0;
        box-sizing: border-box;
      }

      @layer structural {
        :root {
          --accent: light-dark(hsl(12 94% 60%), hsl(280 80% 80%));
          --shadow: light-dark(hsl(0 0% 0% / 0.3), hsl(0 0% 0% / 0.7));
          --heading-size: 33px;
          --count: 3;
          --content-size: calc((var(--count) - 1) * 0.5rem + (var(--count) * 1.25rem) + 1.5rem + 2px);
        }

        .layer {
          pointer-events: none;
          position: relative;
        }

        section.layer {
          flex: 1 1 380px;
          min-width: 300px;
        }

        .content--main {
          width: 100%;
        }

        .table--layer,
        .shadow--table,
        .content--main {
          grid-area: 1 / 1;
          display: grid;
          grid-template-rows: var(--heading-size) calc(var(--heading-size) + var(--content-size));
          padding: 1rem;
          padding-top: 0;
        }

        .layer--status,
        .shadow--status,
        .content--table {
          display: grid;
          grid-template-rows: var(--heading-size) 1fr;
          grid-area: 2 / 1;
        }

        .layer--dialog,
        .content--status {
          grid-area: 2 / 1;
        }

        .mover {
          pointer-events: all;
          grid-area: 1 / 1;
          display: grid;
          grid-template: auto / auto;

          >div {
            grid-area: 1 / 1;
          }
        }

        .mover--nested {
          grid-area: 2 / 1;
        }

        .card-row {
          display: flex;
          flex-wrap: wrap;
          gap: 1rem;
          justify-content: center;
          align-items: flex-start;
          margin-top: 1rem;
        }

        .layer {
          flex-shrink: 0;
          box-sizing: border-box;
        }

        @media (max-width: 768px) {
          .card-row {
            gap: 1rem;
          }

          section.layer {
            width: 100%;
          }
        }

      }

      @layer demo {
        .heading {
          align-items: center;
          display: flex;
          gap: 0.5rem;
          margin: 0;
          font-weight: 600;
          position: relative;
          height: 100%;
          padding: 5px !important;
        }

        .heading svg {
          width: 16px;
        }

        .heading>button {
          aspect-ratio: 1;
          background: #0000;
          border: 0;
          cursor: pointer;
          display: grid;
          place-items: center;
          position: absolute;
          right: 0.75rem;
          top: 50%;
          translate: 0 -50%;
        }

        .heading>button:is(:focus-visible, :hover)::after {
          content: '';
          position: absolute;
          inset: 0;
          border-radius: 6px;
          background: hsl(0 0% 50% / 0.22);
          opacity: 1;
          transition: opacity 0.24s;
        }

        .status {
          background: canvas;
          border-radius: 6px;
          padding: 10px !important;
          height: 100%;
          border: 1px solid color-mix(in hsl, canvas, canvasText 30%);
        }

        .content--table {
          background: color-mix(in hsl, canvas, canvasText 2%);
          border: 1px solid color-mix(in hsl, canvas, canvasText 30%);
          border-radius: 6px;
        }

        dl {
          background: canvas;
          border-radius: 6px;
          height: var(--content-size);
          color: color-mix(in hsl, canvasText, canvas);
          display: grid;
          grid-template-columns: 1fr auto;
          grid-auto-rows: 1.25rem;
          margin: 0;
          padding: 0.75rem;
          gap: 0.5rem 0;
          z-index: 2;
          overflow: hidden;
        }

        dl svg {
          width: 16px;
        }

        dt {
          align-items: center;
          display: flex;
          gap: 0.5rem;
        }

        dd {
          font-weight: 400;
          color: canvasText;
          margin: 0;
          display: flex;
          align-items: center;
          justify-content: flex-end;
        }

        .prepaid {
          color: hsl(140 80% 40%);
          position: relative;
        }

        .prepaid::after {
          content: '';
          width: 6px;
          aspect-ratio: 1;
          border-radius: 50%;
          background: currentColor;
          position: absolute;
          left: 0;
          top: 50%;
          translate: -1ch -50%;
        }
      }
    </style>
    <main class="main-content">
      <h1 class="title">Dashboard</h1>
      <div class="card-row">
        <section class="layer">
          <div class="layer table--layer">
            <div class="mover mover--nested">
              <div class="shadow shadow--status">
                <div></div>
              </div>
              <div class="content content--table">
                <div class="heading">
                  <span>Subscribers</span>
                  <button aria-label="Open database options">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="19" cy="12" r="1" />
                      <circle cx="5" cy="12" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="layer layer--status">
              <div class="mover mover--nested">
                <div class="content content--status">
                  <dl class="status">
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="4 7 4 4 20 4 20 7" />
                        <line x1="9" x2="15" y1="20" y2="20" />
                        <line x1="12" x2="12" y1="4" y2="20" />
                      </svg><span>Name</span></dt>
                    <dd>Course Waitlist</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                      </svg><span>Domain</span></dt>
                    <dd>course.craftofui.com</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M16 8.9V7H8l4 5-4 5h8v-1.9" />
                      </svg><span>Count</span></dt>
                    <dd>23,602</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                        <path d="M12 18V6" />
                      </svg><span>Prepaid</span></dt>
                    <dd><span class="prepaid">16,280</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="layer">
          <div class="layer table--layer">
            <div class="mover mover--nested">
              <div class="shadow shadow--status">
                <div></div>
              </div>
              <div class="content content--table">
                <div class="heading">
                  <span>Subscribers</span>
                  <button aria-label="Open database options">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="19" cy="12" r="1" />
                      <circle cx="5" cy="12" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="layer layer--status">
              <div class="mover mover--nested">
                <div class="content content--status">
                  <dl class="status">
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="4 7 4 4 20 4 20 7" />
                        <line x1="9" x2="15" y1="20" y2="20" />
                        <line x1="12" x2="12" y1="4" y2="20" />
                      </svg><span>Name</span></dt>
                    <dd>Course Waitlist</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                      </svg><span>Domain</span></dt>
                    <dd>course.craftofui.com</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M16 8.9V7H8l4 5-4 5h8v-1.9" />
                      </svg><span>Count</span></dt>
                    <dd>23,602</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                        <path d="M12 18V6" />
                      </svg><span>Prepaid</span></dt>
                    <dd><span class="prepaid">16,280</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="layer">
          <div class="layer table--layer">
            <div class="mover mover--nested">
              <div class="shadow shadow--status">
                <div></div>
              </div>
              <div class="content content--table">
                <div class="heading">
                  <span>Subscribers</span>
                  <button aria-label="Open database options">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="19" cy="12" r="1" />
                      <circle cx="5" cy="12" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="layer layer--status">
              <div class="mover mover--nested">
                <div class="content content--status">
                  <dl class="status">
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="4 7 4 4 20 4 20 7" />
                        <line x1="9" x2="15" y1="20" y2="20" />
                        <line x1="12" x2="12" y1="4" y2="20" />
                      </svg><span>Name</span></dt>
                    <dd>Course Waitlist</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                      </svg><span>Domain</span></dt>
                    <dd>course.craftofui.com</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M16 8.9V7H8l4 5-4 5h8v-1.9" />
                      </svg><span>Count</span></dt>
                    <dd>23,602</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                        <path d="M12 18V6" />
                      </svg><span>Prepaid</span></dt>
                    <dd><span class="prepaid">16,280</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="layer">
          <div class="layer table--layer">
            <div class="mover mover--nested">
              <div class="shadow shadow--status">
                <div></div>
              </div>
              <div class="content content--table">
                <div class="heading">
                  <span>Subscribers</span>
                  <button aria-label="Open database options">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="19" cy="12" r="1" />
                      <circle cx="5" cy="12" r="1" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="layer layer--status">
              <div class="mover mover--nested">
                <div class="content content--status">
                  <dl class="status">
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="4 7 4 4 20 4 20 7" />
                        <line x1="9" x2="15" y1="20" y2="20" />
                        <line x1="12" x2="12" y1="4" y2="20" />
                      </svg><span>Name</span></dt>
                    <dd>Course Waitlist</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                      </svg><span>Domain</span></dt>
                    <dd>course.craftofui.com</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <path d="M16 8.9V7H8l4 5-4 5h8v-1.9" />
                      </svg><span>Count</span></dt>
                    <dd>23,602</dd>
                    <dt><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                        <path d="M12 18V6" />
                      </svg><span>Prepaid</span></dt>
                    <dd><span class="prepaid">16,280</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
      <div class="card-row" style="margin-top: 3rem;">
        <section class="layer chart-layer" style="flex: 1 1 380px; min-width: 300px;">
          <div id="myChart1" style="height: 320px; width: 100%;"></div>
        </section>
        <section class="layer chart-layer" style="flex: 1 1 380px; min-width: 300px;">
          <div id="myChart2" style="height: 320px; width: 100%;"></div>
        </section>
      </div>
      <div class="card-row" style="margin-top: 3rem;">
        <section class="layer chart-layer" style="flex: 1 1 380px; min-width: 300px;">
          <div id="myChart3" style="height: 320px; width: 100%;"></div>
        </section>
        <section class="layer chart-layer" style="flex: 1 1 380px; min-width: 300px;">
          <div id="myChart4" style="height: 320px; width: 100%;"></div>
        </section>
      </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/ag-charts-community@11.3.1/dist/umd/ag-charts-community.js?t=1748412748273"></script>
    <script src="https://cdn.jsdelivr.net/npm/ag-charts-enterprise@11.3.1/dist/umd/ag-charts-enterprise.js"></script>
    <script src="/charts/vanilla/waterfall-series/examples/simple-waterfall/data.js"></script>
    <script src="/charts/vanilla/waterfall-series/examples/simple-waterfall/main.js"></script>
    <script>
      const {
        AgCharts
      } = agCharts;

      const options1 = {
        container: document.getElementById("myChart1"),
        title: {
          text: "Sales by Month Chart 1"
        },
        data: getData(),
        series: [{
            type: "area",
            xKey: "month",
            yKey: "subscriptions",
            yName: "Subscriptions"
          },
          {
            type: "area",
            xKey: "month",
            yKey: "services",
            yName: "Services"
          },
          {
            type: "area",
            xKey: "month",
            yKey: "products",
            yName: "Products"
          },
        ],
      };

      const options2 = {
        container: document.getElementById("myChart2"),
        data: getData2(),
        title: {
          text: "UK Government Budget",
        },
        subtitle: {
          text: "All values in £ billions",
        },
        series: [{
          type: "waterfall",
          xKey: "financials",
          xName: "Financials",
          yKey: "amount",
          yName: "Amount",
        }, ],
      };
      const options3 = {
        container: document.getElementById("myChart3"),
        title: {
          text: "Apple's Revenue by Product Category",
        },
        subtitle: {
          text: "In Billion U.S. Dollars",
        },
        data: getData3(),
        series: [{
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "iphone",
            yName: "iPhone",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "mac",
            yName: "Mac",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "ipad",
            yName: "iPad",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "wearables",
            yName: "Wearables",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "services",
            yName: "Services",
          },
        ],
      };
      const options4 = {
        container: document.getElementById("myChart4"),
        title: {
          text: "Apple's Revenue by Product Category",
        },
        subtitle: {
          text: "In Billion U.S. Dollars",
        },
        data: getData3(),
        series: [{
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "iphone",
            yName: "iPhone",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "mac",
            yName: "Mac",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "ipad",
            yName: "iPad",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "wearables",
            yName: "Wearables",
          },
          {
            type: "bar",
            direction: "horizontal",
            xKey: "quarter",
            yKey: "services",
            yName: "Services",
          },
        ],
      };

      AgCharts.create(options1);
      AgCharts.create(options2);
      AgCharts.create(options3);
      AgCharts.create(options4);

      function getData() {
        return [{
            month: "Jan",
            subscriptions: 222,
            services: 250,
            products: 200
          },
          {
            month: "Feb",
            subscriptions: 240,
            services: 255,
            products: 210
          },
          {
            month: "Mar",
            subscriptions: 280,
            services: 245,
            products: 195
          },
          {
            month: "Apr",
            subscriptions: 300,
            services: 260,
            products: 205
          },
          {
            month: "May",
            subscriptions: 350,
            services: 235,
            products: 215
          },
          {
            month: "Jun",
            subscriptions: 420,
            services: 270,
            products: 200
          },
          {
            month: "Jul",
            subscriptions: 300,
            services: 255,
            products: 225
          },
          {
            month: "Aug",
            subscriptions: 270,
            services: 305,
            products: 210
          },
          {
            month: "Sep",
            subscriptions: 260,
            services: 280,
            products: 250
          },
          {
            month: "Oct",
            subscriptions: 385,
            services: 250,
            products: 205
          },
          {
            month: "Nov",
            subscriptions: 320,
            services: 265,
            products: 215
          },
          {
            month: "Dec",
            subscriptions: 330,
            services: 255,
            products: 220
          },
        ];
      }

      function getData2() {
        return [{
            financials: "Income\nTax",
            amount: 185,
          },
          {
            financials: "VAT",
            amount: 145,
          },
          {
            financials: "NI",
            amount: 134,
          },
          {
            financials: "Corp\nTax",
            amount: 55,
          },
          {
            financials: "Council\nTax",
            amount: 34,
          },
          {
            financials: "Social\nProtection",
            amount: -252,
          },
          {
            financials: "Health",
            amount: -155,
          },
          {
            financials: "Education",
            amount: -112,
          },
          {
            financials: "Defence",
            amount: -65,
          },
          {
            financials: "Debt\nInterest",
            amount: -63,
          },
          {
            financials: "Housing",
            amount: -31,
          },
        ];
      }

      function getData3() {
        return [{
            quarter: "Q1'18",
            iphone: 140,
            mac: 16,
            ipad: 14,
            wearables: 12,
            services: 20,
          },
          {
            quarter: "Q2'18",
            iphone: 124,
            mac: 20,
            ipad: 14,
            wearables: 12,
            services: 30,
          },
          {
            quarter: "Q3'18",
            iphone: 112,
            mac: 20,
            ipad: 18,
            wearables: 14,
            services: 36,
          },
          {
            quarter: "Q4'18",
            iphone: 118,
            mac: 24,
            ipad: 14,
            wearables: 14,
            services: 36,
          },
        ];
      }
    </script>