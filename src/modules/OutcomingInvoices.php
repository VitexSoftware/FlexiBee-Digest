<?php
/*
 * Outcoming Invoices
 */

/**
 * Description of OutcomingInvoices
 *
 * @author vitex
 */
class OutcomingInvoices extends \FlexiPeeHP\Digest\DigestModule implements \FlexiPeeHP\Digest\DigestModuleInterface
{

    public function dig()
    {
        $digger          = new FlexiPeeHP\FakturaVydana();
        $outInvoicesData = $digger->getColumnsFromFlexibee(['kod', 'typDokl', 'sumCelkem',
            'uhrazeno', 'storno', 'mena', 'juhSum', 'juhSumMen'],
            ['datVyst' => $this->interval]);
        $exposed         = 0;
        $invoicedRaw     = [];
        $paid            = [];
        $storno          = 0;

        $typDoklRaw = [];

        foreach ($outInvoicesData as $outInvoiceData) {
            $exposed++;
            if ($outInvoiceData['storno'] == 'true') {
                $storno++;
            }

            if (array_key_exists($outInvoiceData['typDokl'], $typDoklRaw)) {
                $typDoklRaw[$outInvoiceData['typDokl']] ++;
            } else {
                $typDoklRaw[$outInvoiceData['typDokl']] = 1;
            }

            if (array_key_exists($outInvoiceData['mena'], $outInvoiceData)) {
                $invoicedRaw[$outInvoiceData['mena']] += floatval($outInvoiceData['sumCelkem']);
            } else {
                $invoicedRaw[$outInvoiceData['mena']] = floatval($outInvoiceData['sumCelkem']);
            }
        }

        $typDokl = [];
        foreach ($typDoklRaw as $type => $count) {
            $typDokl[] = $count.' x '.FlexiPeeHP\FlexiBeeRO::uncode($type);
        }
        $this->addItem(new \Ease\Html\DivTag(sprintf(_('Exposed %s invoices'),
                $exposed.' '.implode(',', $typDokl))));

        $invoiced = [];
        foreach ($invoicedRaw as $currencyCode => $amount) {
            $invoiced[] = $amount.' '.FlexiPeeHP\FlexiBeeRO::uncode($currencyCode);
        }

        $this->addItem(new \Ease\Html\DivTag(sprintf(_('Invoiced amount %s'),
                implode(',', $invoiced))));

        $this->addItem(new \Ease\Html\DivTag(sprintf(_('Exposed %s invoices'),
                $exposed)));
    }

    public function heading()
    {
        return _('Outcoming invoices');
    }
}