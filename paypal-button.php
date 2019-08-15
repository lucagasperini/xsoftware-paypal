<?php


if ( ! function_exists( 'print_paypal_btn' ) ) :

function print_paypal_btn($url)
{
        wp_enqueue_style('xs_paypal_style', plugins_url('style/paypal.min.css', __FILE__));


        return '<a href="'.$url.'" ><div role="button" data-button=""
data-funding-source="paypal" class="paypal-button
paypal-button-number-0 paypal-button-layout-vertical paypal-button-shape-rect
paypal-button-number-multiple paypal-button-env-sandbox paypal-button-label-paypal
paypal-button-color-gold paypal-logo-color-blue" aria-label="paypal" tabindex="0"><img
src="data:image/svg+xml;base64,
PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAyNCAzMiIgeG1sbnM9Imh0dHA6JiN4MkY7JiN4MkY7d3d3
LnczLm9yZyYjeDJGOzIwMDAmI3gyRjtzdmciIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiPjxwYXRoIGZpbGw9
IiMwMDljZGUiIGQ9Ik0gMjAuOTA1IDkuNSBDIDIxLjE4NSA3LjQgMjAuOTA1IDYgMTkuNzgyIDQuNyBDIDE4LjU2NCAzLjMgMTYu
NDExIDIuNiAxMy42OTcgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMy4xIDQuNjE1IDMuNiBMIDEuMzM5IDI1Ljgg
QyAxLjMzOSAyNi4yIDEuNjIgMjYuNyAyLjA4OCAyNi43IEwgNi45NTYgMjYuNyBMIDYuNjc1IDI4LjkgQyA2LjU4MSAyOS4zIDYu
ODYyIDI5LjYgNy4yMzYgMjkuNiBMIDExLjM1NiAyOS42IEMgMTEuODI1IDI5LjYgMTIuMjkyIDI5LjMgMTIuMzg2IDI4LjggTCAx
Mi4zODYgMjguNSBMIDEzLjIyOCAyMy4zIEwgMTMuMjI4IDIzLjEgQyAxMy4zMjIgMjIuNiAxMy43OSAyMi4yIDE0LjI1OCAyMi4y
IEwgMTQuODIxIDIyLjIgQyAxOC44NDUgMjIuMiAyMS45MzUgMjAuNSAyMi44NzEgMTUuNSBDIDIzLjMzOSAxMy40IDIzLjE1MyAx
MS43IDIyLjAyOSAxMC41IEMgMjEuNzQ4IDEwLjEgMjEuMjc5IDkuOCAyMC45MDUgOS41IEwgMjAuOTA1IDkuNSI+
PC9wYXRoPjxwYXRoIGZpbGw9IiMwMTIxNjkiIGQ9Ik0gMjAuOTA1IDkuNSBDIDIxLjE4NSA3LjQgMjAuOTA1IDYgMTkuNzgyIDQu
NyBDIDE4LjU2NCAzLjMgMTYuNDExIDIuNiAxMy42OTcgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMy4xIDQuNjE1
IDMuNiBMIDEuMzM5IDI1LjggQyAxLjMzOSAyNi4yIDEuNjIgMjYuNyAyLjA4OCAyNi43IEwgNi45NTYgMjYuNyBMIDguMjY3IDE4
LjQgTCA4LjE3MyAxOC43IEMgOC4yNjcgMTguMSA4LjczNSAxNy43IDkuMjk2IDE3LjcgTCAxMS42MzYgMTcuNyBDIDE2LjIyNCAx
Ny43IDE5Ljc4MiAxNS43IDIwLjkwNSAxMC4xIEMgMjAuODEyIDkuOCAyMC45MDUgOS43IDIwLjkwNSA5LjUiPjwvcGF0aD48cGF0
aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDkuNDg1IDkuNSBDIDkuNTc3IDkuMiA5Ljc2NSA4LjkgMTAuMDQ2IDguNyBDIDEwLjIzMiA4
LjcgMTAuMzI2IDguNiAxMC41MTMgOC42IEwgMTYuNjkyIDguNiBDIDE3LjQ0MiA4LjYgMTguMTg5IDguNyAxOC43NTMgOC44IEMg
MTguOTM5IDguOCAxOS4xMjcgOC44IDE5LjMxNCA4LjkgQyAxOS41MDEgOSAxOS42ODggOSAxOS43ODIgOS4xIEMgMTkuODc1IDku
MSAxOS45NjggOS4xIDIwLjA2MyA5LjEgQyAyMC4zNDMgOS4yIDIwLjYyNCA5LjQgMjAuOTA1IDkuNSBDIDIxLjE4NSA3LjQgMjAu
OTA1IDYgMTkuNzgyIDQuNiBDIDE4LjY1OCAzLjIgMTYuNTA2IDIuNiAxMy43OSAyLjYgTCA1LjczOSAyLjYgQyA1LjI3MSAyLjYg
NC43MSAzIDQuNjE1IDMuNiBMIDEuMzM5IDI1LjggQyAxLjMzOSAyNi4yIDEuNjIgMjYuNyAyLjA4OCAyNi43IEwgNi45NTYgMjYu
NyBMIDguMjY3IDE4LjQgTCA5LjQ4NSA5LjUgWiI+PC9wYXRoPjwvc3ZnPg==" alt="PP" class="paypal-logo
paypal-logo-pp paypal-logo-color-blue" style="visibility: visible;"> <img
src="data:image/svg+xml;base64,
PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjMyIiB2aWV3Qm94PSIwIDAgMTAwIDMyIiB4bWxucz0iaHR0cDomI3gyRjsmI3gyRjt3
d3cudzMub3JnJiN4MkY7MjAwMCYjeDJGO3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pbllNaW4gbWVldCI+
PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAxMiA0LjkxNyBMIDQuMiA0LjkxNyBDIDMuNyA0LjkxNyAzLjIgNS4zMTcgMy4xIDUu
ODE3IEwgMCAyNS44MTcgQyAtMC4xIDI2LjIxNyAwLjIgMjYuNTE3IDAuNiAyNi41MTcgTCA0LjMgMjYuNTE3IEMgNC44IDI2LjUx
NyA1LjMgMjYuMTE3IDUuNCAyNS42MTcgTCA2LjIgMjAuMjE3IEMgNi4zIDE5LjcxNyA2LjcgMTkuMzE3IDcuMyAxOS4zMTcgTCA5
LjggMTkuMzE3IEMgMTQuOSAxOS4zMTcgMTcuOSAxNi44MTcgMTguNyAxMS45MTcgQyAxOSA5LjgxNyAxOC43IDguMTE3IDE3Ljcg
Ni45MTcgQyAxNi42IDUuNjE3IDE0LjYgNC45MTcgMTIgNC45MTcgWiBNIDEyLjkgMTIuMjE3IEMgMTIuNSAxNS4wMTcgMTAuMyAx
NS4wMTcgOC4zIDE1LjAxNyBMIDcuMSAxNS4wMTcgTCA3LjkgOS44MTcgQyA3LjkgOS41MTcgOC4yIDkuMzE3IDguNSA5LjMxNyBM
IDkgOS4zMTcgQyAxMC40IDkuMzE3IDExLjcgOS4zMTcgMTIuNCAxMC4xMTcgQyAxMi45IDEwLjUxNyAxMy4xIDExLjIxNyAxMi45
IDEyLjIxNyBaIj48L3BhdGg+
PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAzNS4yIDEyLjExNyBMIDMxLjUgMTIuMTE3IEMgMzEuMiAxMi4xMTcgMzAuOSAxMi4z
MTcgMzAuOSAxMi42MTcgTCAzMC43IDEzLjYxNyBMIDMwLjQgMTMuMjE3IEMgMjkuNiAxMi4wMTcgMjcuOCAxMS42MTcgMjYgMTEu
NjE3IEMgMjEuOSAxMS42MTcgMTguNCAxNC43MTcgMTcuNyAxOS4xMTcgQyAxNy4zIDIxLjMxNyAxNy44IDIzLjQxNyAxOS4xIDI0
LjgxNyBDIDIwLjIgMjYuMTE3IDIxLjkgMjYuNzE3IDIzLjggMjYuNzE3IEMgMjcuMSAyNi43MTcgMjkgMjQuNjE3IDI5IDI0LjYx
NyBMIDI4LjggMjUuNjE3IEMgMjguNyAyNi4wMTcgMjkgMjYuNDE3IDI5LjQgMjYuNDE3IEwgMzIuOCAyNi40MTcgQyAzMy4zIDI2
LjQxNyAzMy44IDI2LjAxNyAzMy45IDI1LjUxNyBMIDM1LjkgMTIuNzE3IEMgMzYgMTIuNTE3IDM1LjYgMTIuMTE3IDM1LjIgMTIu
MTE3IFogTSAzMC4xIDE5LjMxNyBDIDI5LjcgMjEuNDE3IDI4LjEgMjIuOTE3IDI1LjkgMjIuOTE3IEMgMjQuOCAyMi45MTcgMjQg
MjIuNjE3IDIzLjQgMjEuOTE3IEMgMjIuOCAyMS4yMTcgMjIuNiAyMC4zMTcgMjIuOCAxOS4zMTcgQyAyMy4xIDE3LjIxNyAyNC45
IDE1LjcxNyAyNyAxNS43MTcgQyAyOC4xIDE1LjcxNyAyOC45IDE2LjExNyAyOS41IDE2LjcxNyBDIDMwIDE3LjQxNyAzMC4yIDE4
LjMxNyAzMC4xIDE5LjMxNyBaIj48L3BhdGg+
PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSA1NS4xIDEyLjExNyBMIDUxLjQgMTIuMTE3IEMgNTEgMTIuMTE3IDUwLjcgMTIuMzE3
IDUwLjUgMTIuNjE3IEwgNDUuMyAyMC4yMTcgTCA0My4xIDEyLjkxNyBDIDQzIDEyLjQxNyA0Mi41IDEyLjExNyA0Mi4xIDEyLjEx
NyBMIDM4LjQgMTIuMTE3IEMgMzggMTIuMTE3IDM3LjYgMTIuNTE3IDM3LjggMTMuMDE3IEwgNDEuOSAyNS4xMTcgTCAzOCAzMC41
MTcgQyAzNy43IDMwLjkxNyAzOCAzMS41MTcgMzguNSAzMS41MTcgTCA0Mi4yIDMxLjUxNyBDIDQyLjYgMzEuNTE3IDQyLjkgMzEu
MzE3IDQzLjEgMzEuMDE3IEwgNTUuNiAxMy4wMTcgQyA1NS45IDEyLjcxNyA1NS42IDEyLjExNyA1NS4xIDEyLjExNyBaIj48L3Bh
dGg+
PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny41IDQuOTE3IEwgNTkuNyA0LjkxNyBDIDU5LjIgNC45MTcgNTguNyA1LjMxNyA1
OC42IDUuODE3IEwgNTUuNSAyNS43MTcgQyA1NS40IDI2LjExNyA1NS43IDI2LjQxNyA1Ni4xIDI2LjQxNyBMIDYwLjEgMjYuNDE3
IEMgNjAuNSAyNi40MTcgNjAuOCAyNi4xMTcgNjAuOCAyNS44MTcgTCA2MS43IDIwLjExNyBDIDYxLjggMTkuNjE3IDYyLjIgMTku
MjE3IDYyLjggMTkuMjE3IEwgNjUuMyAxOS4yMTcgQyA3MC40IDE5LjIxNyA3My40IDE2LjcxNyA3NC4yIDExLjgxNyBDIDc0LjUg
OS43MTcgNzQuMiA4LjAxNyA3My4yIDYuODE3IEMgNzIgNS42MTcgNzAuMSA0LjkxNyA2Ny41IDQuOTE3IFogTSA2OC40IDEyLjIx
NyBDIDY4IDE1LjAxNyA2NS44IDE1LjAxNyA2My44IDE1LjAxNyBMIDYyLjYgMTUuMDE3IEwgNjMuNCA5LjgxNyBDIDYzLjQgOS41
MTcgNjMuNyA5LjMxNyA2NCA5LjMxNyBMIDY0LjUgOS4zMTcgQyA2NS45IDkuMzE3IDY3LjIgOS4zMTcgNjcuOSAxMC4xMTcgQyA2
OC40IDEwLjUxNyA2OC41IDExLjIxNyA2OC40IDEyLjIxNyBaIj48L3BhdGg+
PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC43IDEyLjExNyBMIDg3IDEyLjExNyBDIDg2LjcgMTIuMTE3IDg2LjQgMTIuMzE3
IDg2LjQgMTIuNjE3IEwgODYuMiAxMy42MTcgTCA4NS45IDEzLjIxNyBDIDg1LjEgMTIuMDE3IDgzLjMgMTEuNjE3IDgxLjUgMTEu
NjE3IEMgNzcuNCAxMS42MTcgNzMuOSAxNC43MTcgNzMuMiAxOS4xMTcgQyA3Mi44IDIxLjMxNyA3My4zIDIzLjQxNyA3NC42IDI0
LjgxNyBDIDc1LjcgMjYuMTE3IDc3LjQgMjYuNzE3IDc5LjMgMjYuNzE3IEMgODIuNiAyNi43MTcgODQuNSAyNC42MTcgODQuNSAy
NC42MTcgTCA4NC4zIDI1LjYxNyBDIDg0LjIgMjYuMDE3IDg0LjUgMjYuNDE3IDg0LjkgMjYuNDE3IEwgODguMyAyNi40MTcgQyA4
OC44IDI2LjQxNyA4OS4zIDI2LjAxNyA4OS40IDI1LjUxNyBMIDkxLjQgMTIuNzE3IEMgOTEuNCAxMi41MTcgOTEuMSAxMi4xMTcg
OTAuNyAxMi4xMTcgWiBNIDg1LjUgMTkuMzE3IEMgODUuMSAyMS40MTcgODMuNSAyMi45MTcgODEuMyAyMi45MTcgQyA4MC4yIDIy
LjkxNyA3OS40IDIyLjYxNyA3OC44IDIxLjkxNyBDIDc4LjIgMjEuMjE3IDc4IDIwLjMxNyA3OC4yIDE5LjMxNyBDIDc4LjUgMTcu
MjE3IDgwLjMgMTUuNzE3IDgyLjQgMTUuNzE3IEMgODMuNSAxNS43MTcgODQuMyAxNi4xMTcgODQuOSAxNi43MTcgQyA4NS41IDE3
LjQxNyA4NS43IDE4LjMxNyA4NS41IDE5LjMxNyBaIj48L3BhdGg+
PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5NS4xIDUuNDE3IEwgOTEuOSAyNS43MTcgQyA5MS44IDI2LjExNyA5Mi4xIDI2LjQx
NyA5Mi41IDI2LjQxNyBMIDk1LjcgMjYuNDE3IEMgOTYuMiAyNi40MTcgOTYuNyAyNi4wMTcgOTYuOCAyNS41MTcgTCAxMDAgNS42
MTcgQyAxMDAuMSA1LjIxNyA5OS44IDQuOTE3IDk5LjQgNC45MTcgTCA5NS44IDQuOTE3IEMgOTUuNCA0LjkxNyA5NS4yIDUuMTE3
IDk1LjEgNS40MTcgWiI+PC9wYXRoPjwvc3ZnPg==" alt="PayPal" class="paypal-logo paypal-logo-paypal
paypal-logo-color-blue" style="visibility: visible;"><div
class="paypal-button-spinner"></div></div><div role="button" data-button=""
data-funding-source="card" class="paypal-button paypal-button-number-1
paypal-button-layout-vertical
paypal-button-shape-rect paypal-button-number-multiple paypal-button-env-sandbox
paypal-button-label-card paypal-button-color-transparent paypal-logo-color-default"
aria-label="card" tabindex="-1"><div class="paypal-button-card paypal-button-card-visa"
tabindex="0"
role="button" data-funding-source="card" data-card="visa"><img
src="data:image/svg+xml;base64,
PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCA0MCAyNCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pbllN
aW4gbWVldCIgeG1sbnM9Imh0dHA6JiN4MkY7JiN4MkY7d3d3LnczLm9yZyYjeDJGOzIwMDAmI3gyRjtzdmciPjxwYXRoIGQ9Ik0w
IDEuOTI3QzAgLjg2My44OTIgMCAxLjk5MiAwaDM2LjAxNkMzOS4xMDggMCA0MCAuODYzIDQwIDEuOTI3djIwLjE0NkM0MCAyMy4x
MzcgMzkuMTA4IDI0IDM4LjAwOCAyNEgxLjk5MkMuODkyIDI0IDAgMjMuMTM3IDAgMjIuMDczVjEuOTI3eiIgZmlsbD0icmdiKDMz
LCA4NiwgMTU0KSI+
PC9wYXRoPjxwYXRoIGQ9Ik0xOS41OTYgNy44ODVsLTIuMTEgOS40NzhIMTQuOTNsMi4xMS05LjQ3OGgyLjU1NHptMTAuNzQzIDYu
MTJsMS4zNDMtMy41Ni43NzMgMy41NkgzMC4zNHptMi44NSAzLjM1OGgyLjM2bC0yLjA2My05LjQ3OEgzMS4zMWMtLjQ5MiAwLS45
MDUuMjc0LTEuMDg4LjY5NWwtMy44MzIgOC43ODNoMi42ODJsLjUzMi0xLjQxNWgzLjI3NmwuMzEgMS40MTV6bS02LjY2Ny0zLjA5
NGMuMDEtMi41MDItMy42LTIuNjQtMy41NzctMy43Ni4wMDgtLjMzOC4zNDUtLjcgMS4wODMtLjc5My4zNjUtLjA0NSAxLjM3My0u
MDggMi41MTcuNDI1bC40NDgtMi4wMWMtLjYxNS0uMjE0LTEuNDA1LS40Mi0yLjM5LS40Mi0yLjUyMyAwLTQuMyAxLjI4OC00LjMx
MyAzLjEzMy0uMDE2IDEuMzY0IDEuMjY4IDIuMTI1IDIuMjM0IDIuNTguOTk2LjQ2NCAxLjMzLjc2MiAxLjMyNSAxLjE3Ny0uMDA2
LjYzNi0uNzkzLjkxOC0xLjUyNi45MjgtMS4yODUuMDItMi4wMy0uMzMzLTIuNjIzLS42bC0uNDYyIDIuMDhjLjU5OC4yNjIgMS43
LjQ5IDIuODQuNTAyIDIuNjgyIDAgNC40MzctMS4yNzMgNC40NDUtMy4yNDN6TTE1Ljk0OCA3Ljg4NGwtNC4xMzggOS40NzhoLTIu
N0w3LjA3NiA5LjhjLS4xMjMtLjQ2Ni0uMjMtLjYzNy0uNjA2LS44MzQtLjYxNS0uMzItMS42My0uNjItMi41Mi0uODA2bC4wNi0u
Mjc1aDQuMzQ1Yy41NTQgMCAxLjA1Mi4zNTQgMS4xNzguOTY2bDEuMDc2IDUuNDg2IDIuNjU1LTYuNDVoMi42ODN6IiBmaWxsPSJy
Z2IoMjU1LCAyNTUsIDI1NSkiPjwvcGF0aD48L3N2Zz4=" alt="Visa" class="paypal-logo-card
paypal-logo-card-visa" style="visibility: visible;"></div><div class="paypal-button-card
paypal-button-card-mastercard" tabindex="0" role="button" data-funding-source="card"
data-card="mastercard"><img
src="data:image/svg+xml;base64,
PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCA0MCAyNCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pbllN
aW4gbWVldCIgeG1sbnM9Imh0dHA6JiN4MkY7JiN4MkY7d3d3LnczLm9yZyYjeDJGOzIwMDAmI3gyRjtzdmciPjxwYXRoIGQ9Ik0w
IDEuOTI3QzAgLjg2My44OTIgMCAxLjk5MiAwaDM2LjAxNkMzOS4xMDggMCA0MCAuODYzIDQwIDEuOTI3djIwLjE0NkM0MCAyMy4x
MzcgMzkuMTA4IDI0IDM4LjAwOCAyNEgxLjk5MkMuODkyIDI0IDAgMjMuMTM3IDAgMjIuMDczVjEuOTI3eiIgZmlsbD0icmdiKDYy
LCA1NywgNTcpIj48L3BhdGg+
PHBhdGggZmlsbD0icmdiKDI1NSwgOTUsIDApIiBkPSJNIDIyLjIwNSAzLjkwMSBMIDE1LjY4OCAzLjkwMSBMIDE1LjY4OCAxNS41
ODkgTCAyMi4yMDUgMTUuNTg5Ij48L3BhdGg+
PHBhdGggZD0iTSAxNi4xIDkuNzQ3IEMgMTYuMSA3LjM3MSAxNy4yMTggNS4yNjUgMTguOTM1IDMuOTAxIEMgMTcuNjcgMi45MTIg
MTYuMDc4IDIuMzEyIDE0LjM0MiAyLjMxMiBDIDEwLjIyMyAyLjMxMiA2Ljg5MiA1LjYzNiA2Ljg5MiA5Ljc0NiBDIDYuODkyIDEz
Ljg1MyAxMC4yMjMgMTcuMTc4IDE0LjM0MiAxNy4xNzggQyAxNi4wNzggMTcuMTc4IDE3LjY3IDE2LjU4IDE4LjkzNSAxNS41ODgg
QyAxNy4yMTYgMTQuMjQ2IDE2LjA5OSAxMi4xMTkgMTYuMDk5IDkuNzQ1IFoiIGZpbGw9InJnYigyMzUsIDAsIDI3KSI+
PC9wYXRoPjxwYXRoIGQ9Ik0gMzAuOTk2IDkuNzQ3IEMgMzAuOTk2IDEzLjg1NCAyNy42NjMgMTcuMTc5IDIzLjU0NyAxNy4xNzkg
QyAyMS44MSAxNy4xNzkgMjAuMjE2IDE2LjU4MSAxOC45NTQgMTUuNTg5IEMgMjAuNjkxIDE0LjIyNyAyMS43ODggMTIuMTIgMjEu
Nzg4IDkuNzQ2IEMgMjEuNzg4IDcuMzcgMjAuNjcxIDUuMjY0IDE4Ljk1NCAzLjkgQyAyMC4yMTYgMi45MTEgMjEuODEgMi4zMTEg
MjMuNTQ3IDIuMzExIEMgMjcuNjYzIDIuMzExIDMwLjk5NiA1LjY1NyAzMC45OTYgOS43NDUgWiIgZmlsbD0icmdiKDI0NywgMTU4
LCAyNykiPjwvcGF0aD48cGF0aCBkPSJNIDcuMTY3IDIyLjQ4MSBMIDcuMTY3IDIwLjQzIEMgNy4xNjcgMTkuNjQxIDYuNjg1IDE5
LjEyNyA1Ljg1NyAxOS4xMjcgQyA1LjQ0MyAxOS4xMjcgNC45OTMgMTkuMjYyIDQuNjgzIDE5LjcxIEMgNC40NCAxOS4zMzIgNC4w
OTYgMTkuMTI3IDMuNTc5IDE5LjEyNyBDIDMuMjMzIDE5LjEyNyAyLjg4OCAxOS4yMyAyLjYxMiAxOS42MDcgTCAyLjYxMiAxOS4x
OTcgTCAxLjg4NiAxOS4xOTcgTCAxLjg4NiAyMi40ODEgTCAyLjYxMiAyMi40ODEgTCAyLjYxMiAyMC42NjggQyAyLjYxMiAyMC4w
ODYgMi45MjEgMTkuODEyIDMuNDA2IDE5LjgxMiBDIDMuODg4IDE5LjgxMiA0LjEzMSAyMC4xMjEgNC4xMzEgMjAuNjY5IEwgNC4x
MzEgMjIuNDgxIEwgNC44NTYgMjIuNDgxIEwgNC44NTYgMjAuNjY4IEMgNC44NTYgMjAuMDg2IDUuMjA0IDE5LjgxMiA1LjY1MSAx
OS44MTIgQyA2LjEzNyAxOS44MTIgNi4zNzcgMjAuMTIxIDYuMzc3IDIwLjY2OSBMIDYuMzc3IDIyLjQ4MSBMIDcuMTcxIDIyLjQ4
MSBaIE0gMTcuOTA5IDE5LjE5NyBMIDE2LjczNCAxOS4xOTcgTCAxNi43MzQgMTguMjA0IEwgMTYuMDA3IDE4LjIwNCBMIDE2LjAw
NyAxOS4xOTcgTCAxNS4zNTIgMTkuMTk3IEwgMTUuMzUyIDE5Ljg0NSBMIDE2LjAwNyAxOS44NDUgTCAxNi4wMDcgMjEuMzUxIEMg
MTYuMDA3IDIyLjEwNiAxNi4zMTkgMjIuNTUxIDE3LjE0NiAyMi41NTEgQyAxNy40NTkgMjIuNTUxIDE3LjgwNCAyMi40NDkgMTgu
MDQ0IDIyLjMwOSBMIDE3LjgzOSAyMS42OTUgQyAxNy42MzIgMjEuODMxIDE3LjM4OSAyMS44NjcgMTcuMjE2IDIxLjg2NyBDIDE2
Ljg3MiAyMS44NjcgMTYuNzM0IDIxLjY2IDE2LjczNCAyMS4zMTkgTCAxNi43MzQgMTkuODQ3IEwgMTcuOTA5IDE5Ljg0NyBMIDE3
LjkwOSAxOS4xOTggWiBNIDI0LjA1MyAxOS4xMjcgQyAyMy42MzkgMTkuMTI3IDIzLjM2NCAxOS4zMzIgMjMuMTkxIDE5LjYwNyBM
IDIzLjE5MSAxOS4xOTcgTCAyMi40NjUgMTkuMTk3IEwgMjIuNDY1IDIyLjQ4MSBMIDIzLjE5MSAyMi40ODEgTCAyMy4xOTEgMjAu
NjMzIEMgMjMuMTkxIDIwLjA4NiAyMy40MzQgMTkuNzc3IDIzLjg4MiAxOS43NzcgQyAyNC4wMTggMTkuNzc3IDI0LjE5MiAxOS44
MTIgMjQuMzMgMTkuODQ3IEwgMjQuNTM4IDE5LjE2MiBDIDI0LjQwMSAxOS4xMjcgMjQuMTkyIDE5LjEyNyAyNC4wNTIgMTkuMTI3
IFogTSAxNC43NjUgMTkuNDY5IEMgMTQuNDIgMTkuMjI5IDEzLjkzNyAxOS4xMjcgMTMuNDE4IDE5LjEyNyBDIDEyLjU4OCAxOS4x
MjcgMTIuMDM2IDE5LjUzOCAxMi4wMzYgMjAuMTg4IEMgMTIuMDM2IDIwLjczNiAxMi40NTMgMjEuMDQ0IDEzLjE3NSAyMS4xNDYg
TCAxMy41MjQgMjEuMTgxIEMgMTMuOTAzIDIxLjI0OSAxNC4xMDggMjEuMzUxIDE0LjEwOCAyMS41MjMgQyAxNC4xMDggMjEuNzY1
IDEzLjgzMiAyMS45MzQgMTMuMzUgMjEuOTM0IEMgMTIuODY0IDIxLjkzNCAxMi40ODQgMjEuNzY0IDEyLjI0NCAyMS41OTIgTCAx
MS44OTggMjIuMTM5IEMgMTIuMjc4IDIyLjQxMSAxMi43OTQgMjIuNTQ5IDEzLjMxMyAyMi41NDkgQyAxNC4yOCAyMi41NDkgMTQu
ODMxIDIyLjEwNSAxNC44MzEgMjEuNDg4IEMgMTQuODMxIDIwLjkwOCAxNC4zODMgMjAuNTk5IDEzLjY5MiAyMC40OTYgTCAxMy4z
NDggMjAuNDYyIEMgMTMuMDM3IDIwLjQyOCAxMi43OTUgMjAuMzYgMTIuNzk1IDIwLjE1NSBDIDEyLjc5NSAxOS45MTQgMTMuMDM4
IDE5Ljc3NyAxMy40MTggMTkuNzc3IEMgMTMuODMgMTkuNzc3IDE0LjI0NSAxOS45NDkgMTQuNDUzIDIwLjA1MiBMIDE0Ljc2NCAx
OS40NjkgWiBNIDM0LjAzMyAxOS4xMjcgQyAzMy42MTggMTkuMTI3IDMzLjM0MiAxOS4zMzIgMzMuMTcxIDE5LjYwNyBMIDMzLjE3
MSAxOS4xOTcgTCAzMi40NDUgMTkuMTk3IEwgMzIuNDQ1IDIyLjQ4MSBMIDMzLjE3MSAyMi40ODEgTCAzMy4xNzEgMjAuNjMzIEMg
MzMuMTcxIDIwLjA4NiAzMy40MTQgMTkuNzc3IDMzLjg2MiAxOS43NzcgQyAzMy45OTggMTkuNzc3IDM0LjE3IDE5LjgxMiAzNC4z
MDcgMTkuODQ3IEwgMzQuNTE1IDE5LjE2MiBDIDM0LjM4IDE5LjEyNyAzNC4xNzIgMTkuMTI3IDM0LjAzMyAxOS4xMjcgWiBNIDI0
Ljc3OSAyMC44MzggQyAyNC43NzkgMjEuODM0IDI1LjQ3IDIyLjU1MSAyNi41NCAyMi41NTEgQyAyNy4wMjUgMjIuNTUxIDI3LjM2
OSAyMi40NDkgMjcuNzE1IDIyLjE3MyBMIDI3LjM2OSAyMS41OTMgQyAyNy4wOTIgMjEuNzk4IDI2LjgxNiAyMS45MDEgMjYuNTA0
IDIxLjkwMSBDIDI1LjkxOSAyMS45MDEgMjUuNTA1IDIxLjQ5IDI1LjUwNSAyMC44NCBDIDI1LjUwNSAyMC4yMjYgMjUuOTE5IDE5
LjgxMyAyNi41MDcgMTkuNzggQyAyNi44MTYgMTkuNzggMjcuMDkyIDE5Ljg4MyAyNy4zNjkgMjAuMDg5IEwgMjcuNzE1IDE5LjUw
NyBDIDI3LjM2OSAxOS4yMzMgMjcuMDI0IDE5LjEzIDI2LjU0IDE5LjEzIEMgMjUuNDcgMTkuMTMgMjQuNzc5IDE5Ljg1IDI0Ljc3
OSAyMC44NDEgWiBNIDMxLjQ3OCAyMC44MzggTCAzMS40NzggMTkuMTk4IEwgMzAuNzUgMTkuMTk4IEwgMzAuNzUgMTkuNjA4IEMg
MzAuNTEgMTkuMyAzMC4xNjUgMTkuMTI4IDI5LjcxNyAxOS4xMjggQyAyOC43ODQgMTkuMTI4IDI4LjA1OCAxOS44NDggMjguMDU4
IDIwLjg0IEMgMjguMDU4IDIxLjgzNSAyOC43ODQgMjIuNTUyIDI5LjcxNiAyMi41NTIgQyAzMC4xOTcgMjIuNTUyIDMwLjU0MyAy
Mi4zODIgMzAuNzQ4IDIyLjA3NCBMIDMwLjc0OCAyMi40ODQgTCAzMS40NzcgMjIuNDg0IEwgMzEuNDc3IDIwLjg0IFogTSAyOC44
MTggMjAuODM4IEMgMjguODE4IDIwLjI1OSAyOS4xOTYgMTkuNzc5IDI5LjgxOSAxOS43NzkgQyAzMC40MDYgMTkuNzc5IDMwLjgy
MSAyMC4yMjQgMzAuODIxIDIwLjg0IEMgMzAuODIxIDIxLjQyNCAzMC40MDYgMjEuOTAyIDI5LjgxOSAyMS45MDIgQyAyOS4xOTYg
MjEuODY5IDI4LjgxOCAyMS40MjQgMjguODE4IDIwLjg0MSBaIE0gMjAuMTQ4IDE5LjEyOCBDIDE5LjE4MyAxOS4xMjggMTguNDk0
IDE5LjgxMyAxOC40OTQgMjAuODQgQyAxOC40OTQgMjEuODY5IDE5LjE4MyAyMi41NTIgMjAuMTg1IDIyLjU1MiBDIDIwLjY3MSAy
Mi41NTIgMjEuMTU0IDIyLjQxNyAyMS41MzMgMjIuMTA4IEwgMjEuMTg4IDIxLjU5NSBDIDIwLjkxNCAyMS43OTkgMjAuNTY1IDIx
LjkzNyAyMC4yMjIgMjEuOTM3IEMgMTkuNzcyIDIxLjkzNyAxOS4zMjMgMjEuNzMyIDE5LjIxOSAyMS4xNDkgTCAyMS42NzEgMjEu
MTQ5IEwgMjEuNjcxIDIwLjg3OCBDIDIxLjcwNSAxOS44MTUgMjEuMDgzIDE5LjEzIDIwLjE1IDE5LjEzIFogTSAyMC4xNDggMTku
NzQ4IEMgMjAuNiAxOS43NDggMjAuOTExIDIwLjAxOSAyMC45OCAyMC41MzIgTCAxOS4yNTMgMjAuNTMyIEMgMTkuMzIxIDIwLjA4
NyAxOS42MzMgMTkuNzQ4IDIwLjE0OCAxOS43NDggWiBNIDM4LjE0MSAyMC44NCBMIDM4LjE0MSAxNy44OTggTCAzNy40MTIgMTcu
ODk4IEwgMzcuNDEyIDE5LjYxIEMgMzcuMTczIDE5LjMwMiAzNi44MjggMTkuMTMgMzYuMzggMTkuMTMgQyAzNS40NDYgMTkuMTMg
MzQuNzIxIDE5Ljg1IDM0LjcyMSAyMC44NDEgQyAzNC43MjEgMjEuODM3IDM1LjQ0NiAyMi41NTQgMzYuMzc5IDIyLjU1NCBDIDM2
Ljg2MSAyMi41NTQgMzcuMjA2IDIyLjM4MyAzNy40MSAyMi4wNzYgTCAzNy40MSAyMi40ODYgTCAzOC4xNCAyMi40ODYgTCAzOC4x
NCAyMC44NDEgWiBNIDM1LjQ4MSAyMC44NCBDIDM1LjQ4MSAyMC4yNjEgMzUuODYxIDE5Ljc4IDM2LjQ4NCAxOS43OCBDIDM3LjA2
OSAxOS43OCAzNy40ODYgMjAuMjI2IDM3LjQ4NiAyMC44NDEgQyAzNy40ODYgMjEuNDI2IDM3LjA2OSAyMS45MDQgMzYuNDg0IDIx
LjkwNCBDIDM1Ljg2MSAyMS44NyAzNS40ODEgMjEuNDI2IDM1LjQ4MSAyMC44NDMgWiBNIDExLjIzNyAyMC44NCBMIDExLjIzNyAx
OS4yIEwgMTAuNTE1IDE5LjIgTCAxMC41MTUgMTkuNjEgQyAxMC4yNzIgMTkuMzAyIDkuOTI4IDE5LjEzIDkuNDc4IDE5LjEzIEMg
OC41NDUgMTkuMTMgNy44MiAxOS44NSA3LjgyIDIwLjg0MSBDIDcuODIgMjEuODM3IDguNTQ1IDIyLjU1NCA5LjQ3NyAyMi41NTQg
QyA5Ljk2IDIyLjU1NCAxMC4zMDQgMjIuMzgzIDEwLjUxMiAyMi4wNzYgTCAxMC41MTIgMjIuNDg2IEwgMTEuMjM2IDIyLjQ4NiBM
IDExLjIzNiAyMC44NDEgWiBNIDguNTQ2IDIwLjg0IEMgOC41NDYgMjAuMjYxIDguOTI2IDE5Ljc4IDkuNTQ4IDE5Ljc4IEMgMTAu
MTM0IDE5Ljc4IDEwLjU1IDIwLjIyNiAxMC41NSAyMC44NDEgQyAxMC41NSAyMS40MjYgMTAuMTM0IDIxLjkwNCA5LjU0OCAyMS45
MDQgQyA4LjkyNiAyMS44NyA4LjU0NiAyMS40MjYgOC41NDYgMjAuODQzIFoiIGZpbGw9InJnYigyNTUsIDI1NSwgMjU1KSI+
PC9wYXRoPjwvc3ZnPg==" alt="Mastercard" class="paypal-logo-card paypal-logo-card-mastercard"
style="visibility: visible;"></div><div class="paypal-button-card paypal-button-card-amex"
tabindex="0" role="button" data-funding-source="card" data-card="amex"><img
src="data:image/svg+xml;base64,
PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCA0MCAyNCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pbllN
aW4gbWVldCIgeG1sbnM9Imh0dHA6JiN4MkY7JiN4MkY7d3d3LnczLm9yZyYjeDJGOzIwMDAmI3gyRjtzdmciPjxwYXRoIGQ9Ik0z
OC4zMzMgMjRIMS42NjdDLjc1IDI0IDAgMjMuMjggMCAyMi40VjEuNkMwIC43Mi43NSAwIDEuNjY3IDBoMzYuNjY2QzM5LjI1IDAg
NDAgLjcyIDQwIDEuNnYyMC44YzAgLjg4LS43NSAxLjYtMS42NjcgMS42eiIgZmlsbD0icmdiKDIwLCAxMTksIDE5MCkiPjwvcGF0
aD48cGF0aCBkPSJNNi4yNiAxMi4zMmgyLjMxM0w3LjQxNSA5LjY2TTI3LjM1MyA5Ljk3N2gtMy43Mzh2MS4yM2gzLjY2NnYxLjM4
NGgtMy42NzV2MS4zODVoMy44MjF2MS4wMDVjLjYyMy0uNzcgMS4zMy0xLjQ2NiAyLjAyNS0yLjIzNWwuNzA3LS43N2MtLjkzNC0x
LjAwNC0xLjg3LTIuMDgtMi44MDQtMy4wNzV2MS4wNzd6IiBmaWxsPSJyZ2IoMjU1LCAyNTUsIDI1NSkiPjwvcGF0aD48cGF0aCBk
PSJNMzguMjUgN2gtNS42MDVsLTEuMzI4IDEuNEwzMC4wNzIgN0gxNi45ODRsLTEuMDE3IDIuNDE2TDE0Ljg3NyA3aC05LjU4TDEu
MjUgMTYuNWg0LjgyNmwuNjIzLTEuNTU2aDEuNGwuNjIzIDEuNTU2SDI5Ljk5bDEuMzI3LTEuNDgzIDEuMzI4IDEuNDgzaDUuNjA1
bC00LjM2LTQuNjY3TDM4LjI1IDd6bS0xNy42ODUgOC4xaC0xLjU1N1Y5Ljg4M0wxNi42NzMgMTUuMWgtMS4zM0wxMy4wMSA5Ljg4
M2wtLjA4NCA1LjIxN0g5LjczbC0uNjIzLTEuNTU2aC0zLjI3TDUuMTMyIDE1LjFIMy40MmwyLjg4NC02Ljc3MmgyLjQybDIuNjQ1
IDYuMjMzVjguMzNoMi42NDZsMi4xMDcgNC41MSAxLjg2OC00LjUxaDIuNTc1VjE1LjF6bTE0LjcyNyAwaC0yLjAyNGwtMi4wMjQt
Mi4yNi0yLjAyMyAyLjI2SDIyLjA2VjguMzI4SDI5LjUzbDEuNzk1IDIuMTc3IDIuMDI0LTIuMTc3aDIuMDI1TDMyLjI2IDExLjc1
bDMuMDMyIDMuMzV6IiBmaWxsPSJyZ2IoMjU1LCAyNTUsIDI1NSkiPjwvcGF0aD48L3N2Zz4=" alt="Amex"
class="paypal-logo-card paypal-logo-card-amex" style="visibility: visible;"></div><div
class="paypal-button-spinner"></div></div></a>';
}

endif;

?>